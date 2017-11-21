<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use DCAS\Traits\Filterable;
use DCAS\Traits\HasGravatar;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use InvalidArgumentException;
use Laravel\Cashier\Billable;
use Laravel\Passport\HasApiTokens;
use Modules\SupportDesk\Models\Comment;
use Modules\SupportDesk\Models\Ticket;
use Nicolaslopezj\Searchable\SearchableTrait;
use Prettus\Repository\Contracts\Presentable;
use Prettus\Repository\Traits\PresentableTrait;
use Rogercbe\TableSorter\Sortable;
use Srmklive\Authy\Auth\TwoFactor\Authenticatable as TwoFactorAuthenticatable;
use Srmklive\Authy\Contracts\Auth\TwoFactor\Authenticatable as TwoFactorAuthenticatableContract;
use Venturecraft\Revisionable\RevisionableTrait;
use Zizaco\Entrust\Traits\EntrustUserTrait;

//use DCAS\Traits\Excludable;
//use Laravel\Scout\Searchable;

class User extends Authenticatable implements Presentable, TwoFactorAuthenticatableContract
{
    use Authorizable, Billable, Filterable, HasApiTokens, HasGravatar, Notifiable, PresentableTrait, RevisionableTrait, SearchableTrait, Sluggable, Sortable, TwoFactorAuthenticatable;

    use EntrustUserTrait {
        EntrustUserTrait::restore as private restoreA;
        EntrustUserTrait::can as may;
        Authorizable::can insteadof EntrustUserTrait;
        EntrustUserTrait::restore insteadof SoftDeletes;
        EntrustUserTrait::boot insteadof RevisionableTrait;
    }
    use SoftDeletes {
        SoftDeletes::restore as private restoreB;
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_disabled' => 'boolean',
        'is_logged_in' => 'boolean',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password', 'domain',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'two_factor_options',
    ];

    /**
     * Enable logging revisions.
     *
     * @var bool
     */
    protected $revisionEnabled = true;

    /**
     * Enable revision logging cleanup.
     *
     * @var bool
     */
    protected $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)

    /**
     * Log model creation events.
     *
     * @var bool
     */
    protected $revisionCreationsEnabled = true;

    /**
     * History limit until cleanup is triggered.
     *
     * @var int
     */
    protected $historyLimit = 500; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.

    /**
     * @var array
     */
    protected $searchable = [
        'columns' => [
            'accounts.name' => 10,
            'accounts.username' => 5,
            'profiles.biography' => 3,
            'profiles.country' => 2,
            'profiles.city' => 1,
        ],
        'joins' => [
            'profiles' => ['accounts.id', 'profiles.user_id'],
        ],
    ];

    /**
     * User model table name.
     *
     * @var string
     */
    protected $table = 'accounts';

    /**
     * @var array
     */
    protected $tableHeaders = [
        'name' => ['title' => 'Full Name'],
        'email' => ['title' => 'E-Mail'],
        'username' => ['sortable' => 'false'],
        'domain' => ['title' => 'Domain Name'],
        'is_logged_in' => ['title' => 'Logged In'],
        'is_disabled' => ['title' => 'Account Status'],
        'created_at' => ['title' => 'Account Creation Date'],
    ];

    /**
     * Roles that are administrators.
     *
     * @var array
     */
    protected $admins = [
        'super_admin',
    ];

    /**
     * Is the user an administrator?
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        $roles = $this->roles->pluck('name')->toArray();

        if (count($roles) === 0) {
            return false;
        }

        return (bool) array_intersect($this->admins, $roles);
    }

    /**
     * Is the user disabled?
     *
     * @return bool
     */
    public function isDisabled(): bool
    {
        return $this->is_disabled;
    }

    /**
     * Is the user online?
     *
     * @return mixed
     */
    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }

    /**
     * Override original trait methods.
     */
    public function restore()
    {
        $this->restoreA();
        $this->restoreB();
    }

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'users_index';
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => ['source' => 'name'],
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    /**
     * @param $roles
     * @param $permissions
     * @param array $options
     *
     * @return array|bool
     */
    public function ability($roles, $permissions, $options = [])
    {
        // Convert string to array if that's what is passed in.
        if (!is_array($roles)) {
            $roles = explode(',', $roles);
        }
        if (!is_array($permissions)) {
            $permissions = explode(',', $permissions);
        }

        // Set up default values and validate options.
        if (!isset($options['validate_all'])) {
            $options['validate_all'] = false;
        } else {
            if ($options['validate_all'] !== true && $options['validate_all'] !== false) {
                throw new InvalidArgumentException();
            }
        }
        if (!isset($options['return_type'])) {
            $options['return_type'] = 'boolean';
        } else {
            if ($options['return_type'] != 'boolean' &&
                $options['return_type'] != 'array' &&
                $options['return_type'] != 'both') {
                throw new InvalidArgumentException();
            }
        }

        // Loop through roles and permissions and check each.
        $checkedRoles = [];
        $checkedPermissions = [];
        foreach ($roles as $role) {
            $checkedRoles[$role] = $this->hasRole($role);
        }
        foreach ($permissions as $permission) {
            $checkedPermissions[$permission] = $this->may($permission);
        }

        // If validate all and there is a false in either
        // Check that if validate all, then there should not be any false.
        // Check that if not validate all, there must be at least one true.
        if (($options['validate_all'] && !(in_array(false, $checkedRoles) || in_array(false, $checkedPermissions))) ||
            (!$options['validate_all'] && (in_array(true, $checkedRoles) || in_array(true, $checkedPermissions)))) {
            $validateAll = true;
        } else {
            $validateAll = false;
        }

        // Return based on option
        if ($options['return_type'] == 'boolean') {
            return $validateAll;
        } elseif ($options['return_type'] == 'array') {
            return ['roles' => $checkedRoles, 'permissions' => $checkedPermissions];
        } else {
            return [$validateAll, ['roles' => $checkedRoles, 'permissions' => $checkedPermissions]];
        }
    }

    /**
     * @param $roles
     *
     * @return bool
     */
    public function authorizeRoles($roles)
    {
        if ($this->hasAnyRole($roles)) {
            return true;
        }
        abort(401, 'This action is unauthorized.');
    }

    /**
     * @param $roles
     *
     * @return bool
     */
    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param $role
     *
     * @return bool
     */
    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }

        return false;
    }
}

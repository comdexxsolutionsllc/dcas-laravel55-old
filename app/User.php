<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use DCAS\Traits\Filterable;
use DCAS\Traits\HasGravatar;
use Gabievi\Promocodes\Traits\Rewardable;

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
use Zizaco\Entrust\Traits\EntrustUserTrait;

//use DCAS\Traits\Excludable;
//use Laravel\Scout\Searchable;

/**
* App\User.
*
* @property int $id
* @property string $name
* @property string $email
* @property string $username
* @property string $password
* @property string|null $domain
* @property string $slug
* @property string|null $stripe_id
* @property string|null $card_brand
* @property string|null $card_last_four
* @property string|null $trial_ends_at
* @property bool $is_logged_in
* @property bool $is_disabled
* @property string|null $remember_token
* @property \Carbon\Carbon|null $created_at
* @property \Carbon\Carbon|null $updated_at
* @property string|null $deleted_at
* @property string|null $phone_country_code
* @property string|null $phone_number
* @property string|null $two_factor_options
* @property \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
* @property \Illuminate\Database\Eloquent\Collection|\Modules\SupportDesk\Models\Comment[] $comments
* @property string $gravatar
* @property bool $using_two_factor_auth
* @property \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
* @property \App\Profile $profile
* @property \Illuminate\Database\Eloquent\Collection|\Venturecraft\Revisionable\Revision[] $revisionHistory
* @property \Illuminate\Database\Eloquent\Collection|\App\Role[] $roles
* @property \Illuminate\Database\Eloquent\Collection|\Laravel\Cashier\Subscription[] $subscriptions
* @property \Illuminate\Database\Eloquent\Collection|\Modules\SupportDesk\Models\Ticket[] $tickets
* @property \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
*
* @method static \Illuminate\Database\Eloquent\Builder|\App\User filter(\DCAS\Filters\QueryFilter $filters)
* @method static \Illuminate\Database\Eloquent\Builder|\App\User findSimilarSlugs($attribute, $config, $slug)
* @method static bool|null forceDelete()
* @method static \Illuminate\Database\Query\Builder|\App\User onlyTrashed()
* @method static bool|null restore()
* @method static \Illuminate\Database\Eloquent\Builder|\App\User search($search, $threshold = null, $entireText = false, $entireTextOnly = false)
* @method static \Illuminate\Database\Eloquent\Builder|\App\User searchRestricted($search, $restriction, $threshold = null, $entireText = false, $entireTextOnly = false)
* @method static \Illuminate\Database\Eloquent\Builder|\App\User sortable($defaultSortColumn = null, $direction = 'asc')
* @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCardBrand($value)
* @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCardLastFour($value)
* @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
* @method static \Illuminate\Database\Eloquent\Builder|\App\User whereDeletedAt($value)
* @method static \Illuminate\Database\Eloquent\Builder|\App\User whereDomain($value)
* @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
* @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
* @method static \Illuminate\Database\Eloquent\Builder|\App\User whereIsDisabled($value)
* @method static \Illuminate\Database\Eloquent\Builder|\App\User whereIsLoggedIn($value)
* @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
* @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
* @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePhoneCountryCode($value)
* @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePhoneNumber($value)
* @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
* @method static \Illuminate\Database\Eloquent\Builder|\App\User whereSlug($value)
* @method static \Illuminate\Database\Eloquent\Builder|\App\User whereStripeId($value)
* @method static \Illuminate\Database\Eloquent\Builder|\App\User whereTrialEndsAt($value)
* @method static \Illuminate\Database\Eloquent\Builder|\App\User whereTwoFactorOptions($value)
* @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
* @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUsername($value)
* @method static \Illuminate\Database\Query\Builder|\App\User withTrashed()
* @method static \Illuminate\Database\Query\Builder|\App\User withoutTrashed()
*/
class User extends Authenticatable implements Presentable, TwoFactorAuthenticatableContract
{
    use Authorizable, Billable, Filterable, HasApiTokens, HasGravatar, Notifiable, PresentableTrait, Rewardable, SearchableTrait, Sluggable, Sortable, TwoFactorAuthenticatable;

    use EntrustUserTrait {
        EntrustUserTrait::restore as private restoreA;
        EntrustUserTrait::can as may;
        Authorizable::can insteadof EntrustUserTrait;
        EntrustUserTrait::restore insteadof SoftDeletes;
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
     * Is the user an administrator?
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        $roles = $this->roles->pluck('name')->toArray();

        return (count($roles) === 0) ? false : \DCAS\Helpers\Arr::find('_admin', $roles);
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

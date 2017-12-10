<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\NullUser
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
 * @property int $is_logged_in
 * @property int $is_disabled
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string|null $phone_country_code
 * @property string|null $phone_number
 * @property string|null $two_factor_options
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\NullComment[] $comments
 * @property-read \App\NullProfile $profile
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\NullTicket[] $tickets
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NullUser whereCardBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NullUser whereCardLastFour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NullUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NullUser whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NullUser whereDomain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NullUser whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NullUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NullUser whereIsDisabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NullUser whereIsLoggedIn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NullUser whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NullUser wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NullUser wherePhoneCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NullUser wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NullUser whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NullUser whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NullUser whereStripeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NullUser whereTrialEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NullUser whereTwoFactorOptions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NullUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NullUser whereUsername($value)
 */
class NullUser extends Authenticatable
{
    /**
     * User model table name.
     *
     * @var string
     */
    protected $table = 'accounts';

    protected $id = 0;
    protected $name = 'Null User';
    protected $email = 'nulluser@domain.tld';
    protected $username = 'null_user';
    protected $domain = null;
    protected $slug = 'null-user';
    protected $is_disabled = 0;

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
     * @return mixed | false
     */
    public function isOnline(): bool
    {
        return false;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(NullComment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile(): HasOne
    {
        return $this->hasOne(NullProfile::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets(): HasMany
    {
        return $this->hasMany(NullTicket::class);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }
}

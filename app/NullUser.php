<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;


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
     * @return boolean
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
}

<?php

namespace App;

use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Laravel\Passport\HasApiTokens;
use Laravel\Scout\Searchable;
use Venturecraft\Revisionable\RevisionableTrait;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Authorizable, Billable, HasApiTokens, Notifiable, RevisionableTrait, Searchable;

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

    public function restore()
    {
        $this->restoreA();
        $this->restoreB();
    }

    protected $revisionEnabled = true;
    protected $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    protected $historyLimit = 500; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.
    protected $revisionCreationsEnabled = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'users_index';
    }
}

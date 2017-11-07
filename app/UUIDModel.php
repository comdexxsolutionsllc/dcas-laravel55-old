<?php

namespace App;

use DCAS\Observers\UUIDModelObserver;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UUIDModel
 *
 * @property string $id
 * @package App\Models
 */
abstract class UUIDModel extends Model
{
    /**
     * Disable auto-incrementing the primary key field for this model.
     *
     * @var bool $incrementing
     */
    public $incrementing = false;

    /**
     * Override the primary key type.
     *
     * @var string $keyType
     */
    protected $keyType = 'string';

    /**
     * Add UUIDModelObserver to the boot method of the current model.
     */
    public static function boot()
    {
        parent::boot();
        self::observe(UUIDModelObserver::class);
    }
}

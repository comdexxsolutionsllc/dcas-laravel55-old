<?php

namespace App;

use DCAS\Observers\ConsumerModelObserver;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Consumer
 *
 * @property string $id
 * @property string|null $api_token
 * @property string $name
 * @property string $url
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model sortable($defaultSortColumn = null, $direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Consumer whereApiToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Consumer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Consumer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Consumer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Consumer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Consumer whereUrl($value)
 * @property string $ip
 * @property int $active
 * @property string|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Consumer onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Consumer whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Consumer whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Consumer whereIp($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Consumer withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Consumer withoutTrashed()
 * @mixin \Eloquent
 */
class Consumer extends UUIDModel
{
    use SoftDeletes;

    /**
     * The API token field.
     *
     * @var string
     */
    private $apiTokenKey = 'api_token';

    /**
     * @var array
     */
    public $fillable = [
        'api_token',
        'name',
        'url',
        'ip',
        'active',
    ];

    /**
     * Add the ConsumerModelObserver to the boot method of the current model.
     */
    public static function boot()
    {
        parent::boot();
        self::observe(ConsumerModelObserver::class);
    }

    /**
     * Return the API token field.
     *
     * @return string
     */
    public function getApiTokenKey()
    {
        return $this->apiTokenKey;
    }
}

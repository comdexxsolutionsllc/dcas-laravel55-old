<?php

namespace App;

use DCAS\Observers\ConsumerModelObserver;

class Consumer extends UUIDModel
{
    /**
     * The API token field.
     *
     * @var string $apiTokenKey
     */
    private $apiTokenKey = 'api_token';

    /**
     * @var array
     */
    public $fillable = [
        'name',
        'url',
        'api_token',
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
     * Return the API token field
     *
     * @return string
     */
    public function getApiTokenKey()
    {
        return $this->apiTokenKey;
    }
}
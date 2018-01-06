<?php

namespace App;

class Page extends Model
{
    /**
     * @var array
     */
    public $fillable = [
        'slug'
    ];

    /**
     * @param $slug
     * @return Page
     */
    public static function findBySlug($slug)
    {
        return new Page(compact('slug'));
    }
}

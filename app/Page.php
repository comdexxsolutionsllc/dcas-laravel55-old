<?php

namespace App;

/**
 * App\Page
 *
 * @property int $id
 * @property string $slug
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model sortable($defaultSortColumn = null, $direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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

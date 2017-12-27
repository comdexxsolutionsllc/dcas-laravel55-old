<?php

namespace App;

use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

/**
 * App\NewsItem
 *
 * @property int $id
 * @property string $title
 * @property string $summary
 * @property string $link
 * @property string $author
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model sortable($defaultSortColumn = null, $direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NewsItem whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NewsItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NewsItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NewsItem whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NewsItem whereSummary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NewsItem whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NewsItem whereUpdatedAt($value)
 */
class NewsItem extends Model implements Feedable
{
    public $fillable = [
        'title',
        'summary',
        'link',
        'author'
    ];

    public function toFeedItem()
    {
        return FeedItem::create()
            ->id($this->id)
            ->title($this->title)
            ->summary($this->summary)
            ->updated($this->updated_at)
            ->link($this->link)
            ->author($this->author);
    }

    public static function getFeedItems()
    {
        return static::all();
    }
}

<?php

namespace Modules\SupportDesk\Models;

use App\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Modules\SupportDesk\Models\Tag
 *
 * @property int $id
 * @property mixed $name
 * @property mixed $slug
 * @property string|null $type
 * @property int|null $order_column
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\SupportDesk\Models\Ticket[] $tickets
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\SupportDesk\Models\Tag onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model sortable($defaultSortColumn = null, $direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Tag whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Tag whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Tag whereOrderColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Tag whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Tag whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Tag whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\SupportDesk\Models\Tag withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\SupportDesk\Models\Tag withoutTrashed()
 * @mixin \Eloquent
 */
class Tag extends Model
{
    use SoftDeletes;

    public $fillable = [
        'name',
        'slug',
        'type',
        'order_column'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tickets(): BelongsToMany
    {
        return $this->belongsToMany(Ticket::class);
    }
}

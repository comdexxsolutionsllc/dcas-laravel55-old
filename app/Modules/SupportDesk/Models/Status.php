<?php

namespace Modules\SupportDesk\Models;

use App\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Modules\SupportDesk\Models\Status
 *
 * @property int $id
 * @property string $name
 * @property string $hex hexadecimal color code
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\SupportDesk\Models\Ticket[] $tickets
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\SupportDesk\Models\Status onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model sortable($defaultSortColumn = null, $direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Status whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Status whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Status whereHex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Status whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Status whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Status whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\SupportDesk\Models\Status withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\SupportDesk\Models\Status withoutTrashed()
 * @mixin \Eloquent
 */
class Status extends Model
{
    use SoftDeletes;

    public $fillable = [
        "name",
        "hex"
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tickets(): BelongsToMany
    {
        return $this->belongsToMany(Ticket::class);
    }
}

<?php

namespace Modules\SupportDesk\Models;

use App\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Modules\SupportDesk\Models\Queue
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\SupportDesk\Models\Ticket[] $tickets
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\SupportDesk\Models\Queue onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model sortable($defaultSortColumn = null, $direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Queue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Queue whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Queue whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Queue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Queue whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Queue whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\SupportDesk\Models\Queue withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\SupportDesk\Models\Queue withoutTrashed()
 * @mixin \Eloquent
 */
class Queue extends Model
{
    use SoftDeletes;

    public $fillable = [
        "name",
        "description"
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class, 'queue_id');
    }
}

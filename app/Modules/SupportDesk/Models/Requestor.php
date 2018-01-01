<?php

namespace Modules\SupportDesk\Models;

use App\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Modules\SupportDesk\Models\Requestor
 *
 * @property int $id
 * @property string $firstName
 * @property string $lastName
 * @property string $email
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\SupportDesk\Models\Ticket[] $tickets
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\SupportDesk\Models\Requestor onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model sortable($defaultSortColumn = null, $direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Requestor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Requestor whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Requestor whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Requestor whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Requestor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Requestor whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Requestor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\SupportDesk\Models\Requestor withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\SupportDesk\Models\Requestor withoutTrashed()
 * @mixin \Eloquent
 */
class Requestor extends Model
{
    use SoftDeletes;

    public $fillable = [
        "firstName",
        "lastName",
        "email"
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tickets(): BelongsToMany
    {
        return $this->belongsToMany(Ticket::class);
    }
}

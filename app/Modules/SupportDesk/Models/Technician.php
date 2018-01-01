<?php

namespace Modules\SupportDesk\Models;

use App\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Modules\SupportDesk\Models\Technician
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
 * @method static \Illuminate\Database\Query\Builder|\Modules\SupportDesk\Models\Technician onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model sortable($defaultSortColumn = null, $direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Technician whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Technician whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Technician whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Technician whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Technician whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Technician whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Technician whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\SupportDesk\Models\Technician withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\SupportDesk\Models\Technician withoutTrashed()
 * @mixin \Eloquent
 */
class Technician extends Model
{
    use SoftDeletes;

    public $fillable = [
        "firstName",
        "lastName",
        "email"
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }
}

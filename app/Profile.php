<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Profile.
 *
 * @property int $id
 * @property int $user_id
 * @property string $username
 * @property string|null $biography
 * @property string $address_1
 * @property string|null $address_2
 * @property string $city
 * @property string $state
 * @property string $country
 * @property int $postal_code
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property \Illuminate\Database\Eloquent\Collection|\Venturecraft\Revisionable\Revision[] $revisionHistory
 *
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Profile onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model sortable($defaultSortColumn = null, $direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereAddress1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereBiography($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereUsername($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Profile withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Profile withoutTrashed()
 */
class Profile extends Model
{
    use SoftDeletes;
}

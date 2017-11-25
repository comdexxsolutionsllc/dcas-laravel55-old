<?php

namespace App;

/**
 * App\ActionLog.
 *
 * @property int $id
 * @property int $user_id
 * @property string $route
 * @property string $method
 * @property string $action
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property \Illuminate\Database\Eloquent\Collection|\Venturecraft\Revisionable\Revision[] $revisionHistory
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model sortable($defaultSortColumn = null, $direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ActionLog whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ActionLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ActionLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ActionLog whereMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ActionLog whereRoute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ActionLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ActionLog whereUserId($value)
 */
class ActionLog extends Model
{
}

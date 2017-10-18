<?php

namespace App;

use Zizaco\Entrust\EntrustRole;

/**
 * App\Role
 *
 * @property int $id
 * @property string $name
 * @property string|null $display_name
 * @property string|null $description
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereUpdatedAt($value)
 */
class Role extends EntrustRole
{
    /**
     * name — Unique name for the Role, used for looking up role information in the application layer. For example: "admin", "owner", "employee".
     * display_name — Human readable name for the Role. Not necessarily unique and optional. For example: "User Administrator", "Project Owner", "Widget Co. Employee".
     * description — A more detailed explanation of what the Role does. Also optional.
     */
}

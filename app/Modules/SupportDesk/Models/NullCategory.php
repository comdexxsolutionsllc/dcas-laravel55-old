<?php

namespace Modules\SupportDesk\Models;

use App\Model;

/**
 * Modules\SupportDesk\Models\NullCategory
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model sortable($defaultSortColumn = null, $direction = 'asc')
 * @mixin \Eloquent
 */
class NullCategory extends Model
{
    /**
     * @var string
     */
    protected $name = '';

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}

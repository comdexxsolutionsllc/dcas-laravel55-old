<?php

namespace Modules\SupportDesk\Models;

use App\Model;

/**
 * Modules\SupportDesk\Models\NullQueue
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model sortable($defaultSortColumn = null, $direction = 'asc')
 * @mixin \Eloquent
 */
class NullQueue extends Model
{
    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var string
     */
    protected $description = '';

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
}

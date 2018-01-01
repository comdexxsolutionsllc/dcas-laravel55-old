<?php

namespace Modules\SupportDesk\Models;

use App\Model;

/**
 * Modules\SupportDesk\Models\NullStatus
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model sortable($defaultSortColumn = null, $direction = 'asc')
 * @mixin \Eloquent
 */
class NullStatus extends Model
{
    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var string
     */
    protected $hex = '000000';

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
    public function getHex(): string
    {
        return $this->hex;
    }
}

<?php

namespace Modules\SupportDesk\Models;

use App\Model;

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

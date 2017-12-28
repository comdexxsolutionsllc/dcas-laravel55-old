<?php

namespace Modules\SupportDesk\Models;

use App\Model;

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

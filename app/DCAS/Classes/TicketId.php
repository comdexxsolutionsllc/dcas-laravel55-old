<?php

namespace DCAS\Classes;

class TicketId
{
    protected $ticketId;

    /**
     * Generate a variable length ticket ID.
     *
     * @param int $length ticket Length
     * @return string ticket ID
     */
    public function generate($length = 10)
    {
        $rnd = srand((double)microtime(TRUE) * 1000000);
        $chars = array_flatten(array_merge(range('A', 'Z'), range(1, 9)));

        for ($rand = 0; $rand < $length; $rand++)
            $rnd .= $chars[rand(0, count($chars) - 1)];

        $rnd = strtoupper(substr($rnd . uniqid(), 0, $length));

        return ($this->ticketId = $rnd);
    }

    public static function generateStatic($length = 10)
    {
        $result = srand((double)microtime(TRUE) * 1000000);
        $chars = array_flatten(array_merge(range('A', 'Z'), range(1, 9)));

        for ($rand = 0; $rand < $length; $rand++)
            $result .= $chars[rand(0, count($chars) - 1)];

        $result = strtoupper(substr($result . uniqid(), 0, $length));

        return $result;
    }
}

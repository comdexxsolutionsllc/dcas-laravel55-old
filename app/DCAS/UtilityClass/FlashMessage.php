<?php

namespace DCAS\UtilityClass;

use Flashy;

class FlashMessage
{
    /**
     * @param $message
     * @param null $url
     * @return $this
     */
    public static function info($message, $url = null)
    {
        return Flashy::info($message, $url);
    }

    /**
     * @param $message
     * @param null $url
     * @return $this
     */
    public static function success($message, $url = null)
    {
        return Flashy::success($message, $url);
    }

    /**
     * @param $message
     * @param null $url
     * @return $this
     */
    public static function error($message, $url = null)
    {
        return Flashy::error($message, $url);
    }

    /**
     * @param $message
     * @param null $url
     * @return $this
     */
    public static function warning($message, $url = null)
    {
        return Flashy::warning($message, $url);
    }

    /**
     * @param $message
     * @param null $url
     * @return $this
     */
    public static function primary($message, $url = null)
    {
        return Flashy::primary($message, $url);
    }

    /**
     * @param $message
     * @param null $url
     * @return $this
     */
    public static function primaryDark($message, $url = null)
    {
        return Flashy::primaryDark($message, $url);
    }

    /**
     * @param $message
     * @param null $url
     * @return $this
     */
    public static function muted($message, $url = null)
    {
        return Flashy::muted($message, $url);
    }

    /**
     * @param $message
     * @param null $url
     * @return $this
     */
    public static function mutedDark($message, $url = null)
    {
        return Flashy::mutedDark($message, $url);
    }
}

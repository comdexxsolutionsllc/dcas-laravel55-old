<?php

namespace DCAS\UtilityClass;

class FlashMessage
{
    public static function info($message, $url = null)
    {
        return Flashy::info($message, $url);
    }

    public static function success($message, $url = null)
    {
        return Flashy::success($message, $url);
    }

    public static function error($message, $url = null)
    {
        return Flashy::error($message, $url);
    }

    public static function warning($message, $url = null)
    {
        return Flashy::warning($message, $url);
    }

    public static function primary($message, $url = null)
    {
        return Flashy::primary($message, $url);
    }

    public static function primaryDark($message, $url = null)
    {
        return Flashy::primaryDark($message, $url);
    }

    public static function muted($message, $url = null)
    {
        return Flashy::muted($message, $url);
    }

    public static function mutedDark($message, $url = null)
    {
        return Flashy::mutedDark($message, $url);
    }
}

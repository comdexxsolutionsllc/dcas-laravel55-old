<?php

/**
 * Authy configuration & API credentials.
 *
 * @author Raza Mehdi<srmk@outlook.com>
 */

return [
    'mode' => env('AUTHY_MODE', 'live'), // Can be either 'live' or 'sandbox'. If empty or invalid 'live' will be used
    'sandbox' => [
        'key' => env('AUTHY_TEST_KEY', ''),
    ],
    'live' => [
        'key' => env('AUTHY_LIVE_KEY', 'QSnb3nWL7qnre0nfw3S26MJiYV3Zeqfy'),
    ],
    'sms' => env('AUTHY_SEND_SMS', true),
];

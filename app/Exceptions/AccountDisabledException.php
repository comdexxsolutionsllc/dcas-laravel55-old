<?php

namespace App\Exceptions;

use Exception;
use Log;

class AccountDisabledException extends Exception
{
    protected $message = 'Your account has been disabled.';

    /**
     * Render the exception into an HTTP response.
     */
    public function render()
    {
        return response()->view('errors.account-disabled', [], 500);
    }

    public function report()
    {
        return Log::error($this->message);
    }
}

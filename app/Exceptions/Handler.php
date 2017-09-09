<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Session\TokenMismatchException;
use Tylercd100\LERN\Facades\LERN as LERN;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        if ($this->shouldReport($exception)) {

            //Check to see if LERN is installed otherwise you will not get an exception.
            if (app()->bound("lern")) {
                app()->make("lern")->handle($exception); //Record and Notify the Exception

                /*
                OR...
                app()->make("lern")->record($e); //Record the Exception to the database
                app()->make("lern")->notify($e); //Notify the Exception
                */
            }
        }

        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        /**
         * Gracefully handles TokenMismatchExceptions
         * @source https://gist.github.com/jrmadsen67/bd0f9ad0ef1ed6bb594e
         */
        if ($exception instanceof TokenMismatchException) {
            return redirect()
                ->back()
                ->withInput($request->except('password', '_token'))
                ->withError('Validation Token has expired. Please try again');
        }

        return parent::render($request, $exception);
    }
}

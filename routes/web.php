<?php

use DCAS\UtilityClass\FlashMessage;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

/** Auth::routes() */
// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::match(array('GET', 'POST'), 'register', function () {
    FlashMessage::info('Registration is closed.  Please contact the administrator for more information.');

    return redirect('/');
});

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');
/** End Auth::routes() */

/** Authentication token login/logout */
Route::get('auth/token', 'Auth\TwoFactorAuthController@getToken');
Route::post('auth/token', 'Auth\TwoFactorAuthController@postToken');
/** End Authentication token login/logout */

Route::view('/', 'welcome')->name('welcome');
Route::get('/home', 'HomeController@index')->name('user.home');


// API route for search.
Route::get('find', 'SearchController@find')->name('find')->middleware(['auth']);

// View route for search.
Route::get('/search', function () {
    abort(403);
})->name('search');

// Dashboard profile.
Route::get('/dashboard/profile/{username}', 'ProfileController@get')
    ->name('profile.{username}')->middleware(['auth']);

Route::get('sms', function () {
    $user = App\User::find(1);

    try {
        \Authy::getProvider()->sendSmsToken($user);
    } catch (Exception $e) {
        app(ExceptionHandler::class)->report($e);

        return response()->json(['error' => ['Unable To Send 2FA Login Token']], 422);
    }
});
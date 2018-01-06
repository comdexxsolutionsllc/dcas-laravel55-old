<?php

/** Auth::routes() */
// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login')->name('login.post');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::match(['GET', 'POST'], 'register', function () {
    FlashMessage::info('Registration is closed.  Please contact the administrator for more information.');

    return redirect('/');
})->name('register');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset.{token}');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.reset.post');
/* End Auth::routes() */

/* Authentication token login/logout */
Route::get('auth/token', 'Auth\TwoFactorAuthController@getToken')->name('token');
Route::post('auth/token', 'Auth\TwoFactorAuthController@postToken')->name('token.post');
/* End Authentication token login/logout */

Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');

Route::get('/2fa', 'PasswordSecurityController@show2faForm');
Route::post('/2fa', 'PasswordSecurityController@enable2fa')->name('enable2fa');
Route::post('/2faVerify', function () {
    return redirect(URL()->previous());
})->name('2faVerify')->middleware('2fa');
Route::post('/disable2fa', 'PasswordSecurityController@disable2fa')->name('disable2fa');
Route::post('/generate2faSecret', 'PasswordSecurityController@generate2faSecret')->name('generate2faSecret');

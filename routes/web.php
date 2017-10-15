<?php
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

Auth::routes();

Route::get('auth/token','Auth\AuthController@getToken');
Route::post('auth/token','Auth\AuthController@postToken');

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

Route::get('sms', function() {
    $user = App\User::find(1);

    try {
        \Authy::getProvider()->sendSmsToken($user);
    } catch (Exception $e) {
        app(ExceptionHandler::class)->report($e);

        return response()->json(['error' => ['Unable To Send 2FA Login Token']], 422);
    }
});
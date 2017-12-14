<?php

use App\User;
use Carbon\Carbon;

// middleware:  'auth:api'
Route::prefix('v1')->group(function () {
    Route::get('/', function () {
        abort(Symfony\Component\HttpFoundation\Response::HTTP_NOT_IMPLEMENTED, 'API version not implemented.');
    })->name('root');

    Route::post('online-users', function () {
        return [
            'users' => $users = User::where('is_logged_in', true)->pluck('username'),
            'timestamp' => Carbon::now()->toDateTimeString()
        ];
    });
});

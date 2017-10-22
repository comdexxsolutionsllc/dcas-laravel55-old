<?php
Route::get('/', function () {
    $user = (auth()->check()) ? auth()->user() : new \App\NullUser();

    return view('dashboard.admin.index')->with(compact('user'));
})->name('index')->middleware(['auth']);

Route::get('user/switch/start/{id}', 'UserController@user_switch_start');
Route::get('user/switch/stop', 'UserController@user_switch_stop');

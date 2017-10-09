<?php
// Fixed routes.
Auth::routes();

Route::view('/', 'welcome')->name('welcome');

// Public routes.
Route::get('/search', function () {
    return App\User::filter(request()->only(['name']))->get();
})->name('search');

// Catch-all Routes for Dashboards.
// None.

Route::get('/home', 'HomeController@index');

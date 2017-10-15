<?php
Auth::routes();

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

<?php
// Fixed routes.
Auth::routes();

Route::view('/', 'welcome')->name('welcome');

// Public routes.
Route::get('find', 'SearchController@find');

Route::get('/search', function () {
    return App\User::filter(request()->only(['name']))->get();
})->name('search');

// Catch-all Routes for Dashboards.
// None.

Route::get('/home', 'HomeController@index');

Route::get('/under-construction', function () {
    return response([
        'error' => [
            'message' => 'The current page is under construction.  Please check back later.',
            'status_code' => 403
        ]
    ]);
});
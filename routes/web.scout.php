<?php

// API route for search.
Route::get('/find', 'SearchController@find')->name('find')->middleware(['auth']);

// View route for search.
Route::get('/search', function () {
    abort(403);
})->name('search');

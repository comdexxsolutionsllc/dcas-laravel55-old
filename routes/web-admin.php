<?php
Route::view('/', 'dashboard.admin.index')->name('index');

Route::get('/dashboard/admin/{view}', function ($view) {
    try {
        $view = 'dashboard.admin.' . $view;

        return view($view);
    } catch (\Exception $e) {
        abort(404);
    }
})->where('view', '.*');

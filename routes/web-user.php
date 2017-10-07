<?php
// TODO: Remove. Debug only.
Route::get('/', function () {
    return ['path' => 'dashboard-user-index', 'debug' => true];
})->name('index');

Route::get('/dashboard/{view}', function ($view) {
    try {
        $view = 'dashboard.user.' . $view;

        return view($view);
    } catch (\Exception $e) {
        abort(404);
    }
})->where('view', '.*');

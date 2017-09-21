<?php

// middleware:  'auth:api'
Route::prefix('v1')->group(function () {
    Route::get('/', function() {
        abort(Symfony\Component\HttpFoundation\Response::HTTP_NOT_IMPLEMENTED, 'API version not implemented.');
    })->name('root');
});

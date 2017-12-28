<?php

use Illuminate\Support\Facades\Route;

Route::prefix('api/v1')
    ->middleware('api')
    ->as('supportdesk.api.v1.')
    ->namespace('Modules\SupportDesk\Controllers\API')
    ->group(base_path('app/Modules/SupportDesk/routes/api.v1.php'));

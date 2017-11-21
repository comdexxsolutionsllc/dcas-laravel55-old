<?php

Route::group(['module' => 'SystemMonitoring', 'prefix' => 'SystemMonitoring', 'middleware' => ['api'], 'namespace' => 'Modules\SystemMonitoring\Controllers'], function () {
    Route::resource('SystemMonitoring', 'SystemMonitoringController');
});

<?php

Route::group(['module' => 'SystemMonitoring', 'prefix' => 'SystemMonitoring', 'middleware' => ['web'], 'namespace' => 'Modules\SystemMonitoring\Controllers'], function() {

    Route::resource('SystemMonitoring', 'SystemMonitoringController');

});

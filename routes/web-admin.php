<?php
Route::view('/', 'dashboard.admin.index')->name('index')->middleware(['auth']);

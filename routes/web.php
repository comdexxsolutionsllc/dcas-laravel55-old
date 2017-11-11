<?php

Route::feeds();

Route::view('/', 'welcome')->name('welcome');
Route::get('/home', 'HomeController@index')->name('user.home');

// Dashboard profile.
Route::get('/dashboard/profile/{username}', 'ProfileController@get')->name('profile.{username}')->middleware(['auth']);

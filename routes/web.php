<?php

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');
Route::get('/search', function () {
    return App\User::filter(request()->only(['name']))->get();
    // return App\User::search($request->input('q'))->get();
})->name('search');

Route::post('stripe/webhook', 'Api\WebhookController@handleWebhook')->name('stripe.webhook');

Route::view('/', 'welcome')->name('welcome');

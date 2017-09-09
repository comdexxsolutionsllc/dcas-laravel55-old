<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');
Route::get('/search', function (Request $request) {
    return abort(501, 'Not implemented.');
    // return App\User::search($request->input('q'))->get();
})->name('search');

Route::post('stripe/webhook', 'WebhookController@handleWebhook')->name('stripe.webhook');

Route::view('/', 'welcome')->name('welcome');
Route::view('/admin/dashboard', 'admin.dashboard.dashboard')->name('admin.dashboard');

Route::get('/test', function () {
    return App\User::filter(request()->all())->get();
});
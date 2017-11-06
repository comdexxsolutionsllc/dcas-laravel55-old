<?php

Route::group(['module' => 'SupportDesk', 'prefix' => 'SupportDesk', 'middleware' => ['web'], 'namespace' => 'Modules\SupportDesk\Controllers'], function () {
    Route::post('comment', 'CommentsController@postComment');
    Route::get('my_tickets', 'TicketsController@userTickets')->name('supportdesk.my_tickets');
    Route::get('new_ticket', 'TicketsController@create')->name('supportdesk.new_ticket');
    Route::post('new_ticket', 'TicketsController@store');
    Route::get('tickets/{ticket_id}', 'TicketsController@show');

    Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
        Route::get('tickets', 'TicketsController@index')->name('supportdesk.admin.tickets');
        Route::get('closed_tickets', 'TicketsController@showClosed')->name('supportdesk.admin.closed_tickets');
        Route::post('close_ticket/{ticket_id}', 'TicketsController@close');
        Route::post('open_ticket/{ticket_id}', 'TicketsController@open');

        Route::resource('permissions', 'PermissionsController');
        Route::resource('roles', 'RolesController');
    });
});

<?php

Route::group(['module' => 'SupportDesk', 'prefix' => 'SupportDesk'], function () {
    Route::post('comment', 'CommentsController@postComment')->name('comment.post');
    Route::get('my_tickets', 'TicketsController@userTickets')->name('my_tickets');
    Route::post('new_ticket', 'TicketsController@store')->name('new_ticket.post');
    Route::get('tickets/{ticket_id}', 'TicketsController@show')->name('tickets.{ticket_id}');

    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::apiResource('categories', 'CategoryController');
        Route::apiResource('permissions', 'PermissionsController');
        Route::apiResource('queues', 'QueueController');
        Route::apiResource('roles', 'RolesController');
        Route::apiResource('statuses', 'StatusController');
        Route::apiResource('tags', 'TagController');

        Route::get('tickets', 'TicketsController@index')->name('tickets');
        Route::post('close_ticket/{ticket_id}', 'TicketsController@close')->name('close_ticket.{ticket_id}');
        Route::post('open_ticket/{ticket_id}', 'TicketsController@open')->name('open_ticket.{ticket_id}');
    });
});

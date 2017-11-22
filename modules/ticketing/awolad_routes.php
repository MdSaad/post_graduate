<?php

/* passengers ticket information */
Route::get('passengers-ticket-info', [
    'as' => 'passengers-ticket-info',
    'uses' => 'PassengersTicketInfoController@index'
]);
Route::any("create-passengers-ticket-info", [
    "as" => "create-passengers-ticket-info",
    "uses" => "PassengersTicketInfoController@create"
]);
Route::any("store-passengers-ticket-info", [
    "as" => "store-passengers-ticket-info",
    "uses" => "PassengersTicketInfoController@store"
]);
Route::any("view-passengers-ticket-info/{id}", [
    "as" => "view-passengers-ticket-info",
    "uses" => "PassengersTicketInfoController@show"
]);
Route::any("edit-passengers-ticket-info/{id}", [
    "as" => "edit-passengers-ticket-info",
    "uses" => "PassengersTicketInfoController@edit"
]);
Route::any("update-passengers-ticket-info/{id}", [
    "as" => "update-passengers-ticket-info",
    "uses" => "PassengersTicketInfoController@update"
]);
Route::any("delete-passengers-ticket-info/{id}", [
    "as" => "delete-passengers-ticket-info",
    "uses" => "PassengersTicketInfoController@delete"
]);
/* passengers ticket information */







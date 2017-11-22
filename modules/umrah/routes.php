<?php

Route::group(array(
    'prefix' => 'umrah',
    'modules' => 'Umrah',
    'namespace' => 'Modules\Umrah\Controllers',
    'middleware' => 'auth'
), function () {

    /* umrah */
    Route::get( 'umrah-client-info', [
        'as'   => 'umrah-client-info',
        'uses' => 'UmrahClientInfoController@index'
    ] );
    Route::any( "store-umrah-client-info", [
        "as"   => "store-umrah-client-info",
        "uses" => "UmrahClientInfoController@store"
    ] );
    Route::any( "view-umrah-client-info/{id}", [
        "as"   => "view-umrah-client-info",
        "uses" => "UmrahClientInfoController@show"
    ] );
    Route::any( "edit-umrah-client-info/{id}", [
        "as"   => "edit-umrah-client-info",
        "uses" => "UmrahClientInfoController@edit"
    ] );
    Route::any( "update-umrah-client-info/{id}", [
        "as"   => "update-umrah-client-info",
        "uses" => "UmrahClientInfoController@update"
    ] );
    Route::any( "receive-umrah-client-info/{id}", [
        "as"   => "receive-umrah-client-info",
        "uses" => "UmrahClientInfoController@receive"
    ] );
    Route::any( "store-receive-umrah-client-info/{id}", [
        "as"   => "store-receive-umrah-client-info",
        "uses" => "UmrahClientInfoController@storeReceive"
    ] );
    Route::any( "delete-umrah-client-info/{id}", [
        "as"   => "delete-umrah-client-info",
        "uses" => "UmrahClientInfoController@delete"
    ] );
    /* umrah */
});
<?php

Route::group(array(
    'prefix' => 'hazz',
    'modules' => 'Hazz',
    'namespace' => 'Modules\Hazz\Controllers',
    'middleware' => 'auth'
), function () {

    /* hazz */
    Route::get('hazz-client-info', [
        'as' => 'hazz-client-info',
        'uses' => 'HazzClientInfoController@index'
    ]);
    Route::any("store-hazz-client-info", [
        "as" => "store-hazz-client-info",
        "uses" => "HazzClientInfoController@store"
    ]);
    Route::any("view-hazz-client-info/{id}", [
        "as" => "view-hazz-client-info",
        "uses" => "HazzClientInfoController@show"
    ]);
    Route::any("edit-hazz-client-info/{id}", [
        "as" => "edit-hazz-client-info",
        "uses" => "HazzClientInfoController@edit"
    ]);
    Route::any("update-hazz-client-info/{id}", [
        "as" => "update-hazz-client-info",
        "uses" => "HazzClientInfoController@update"
    ]);
    Route::any("receive-hazz-client-info/{id}", [
        "as" => "receive-hazz-client-info",
        "uses" => "HazzClientInfoController@receive"
    ]);
    Route::any("store-receive-hazz-client-info/{id}", [
        "as" => "store-receive-hazz-client-info",
        "uses" => "HazzClientInfoController@storeReceive"
    ]);
    Route::any("delete-hazz-client-info/{id}", [
        "as" => "delete-hazz-client-info",
        "uses" => "HazzClientInfoController@delete"
    ]);
    /* hazz */

    /* hazz client report */
    Route::get("hazz-client-info-report", [
        "as" => "hazz-client-info-report",
        "uses" => "HazzClientInfoReportController@index"
    ]);
    Route::any("generate-hazz-client-info-report", [
        "as" => "generate-hazz-client-info-report",
        "uses" => "HazzClientInfoReportController@generate_hazz_client_info_report"
    ]);
    /* hazz client report */

    /* hazz client report */
    Route::get("hazz-client-payment-receive-report", [
        "as" => "hazz-client-payment-receive-report",
        "uses" => "HazzClientPaymentReceiveReportController@index"
    ]);
    Route::any("generate-hazz-client-payment-receive-report", [
        "as" => "generate-hazz-client-payment-receive-report",
        "uses" => "HazzClientPaymentReceiveReportController@generate_hazz_client_payment_receive_report"
    ]);
    /* hazz client report */

});
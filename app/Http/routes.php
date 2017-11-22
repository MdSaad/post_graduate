<?php

Route::get('/', function () {
    //return view('welcome');
	return redirect('dashboard');
});

//redirect /admin route to dashboard
Route::any('/admin', function () {
    return redirect('dashboard');
});

/*Route::any('/', [
    'as' => 'dashboard',
    'uses' => 'HomeController@dashboard'
]);*/

Route::get('get-user-login', [
    'as' => 'get-user-login',
    'uses' => 'Auth\AuthController@getLogin'
]);

Route::any('post-user-login', [
    'as' => 'post-user-login',
    'uses' => 'Auth\AuthController@postLogin'
]);

Route::any('reset-password/{user_id}', [
    'as' => 'reset-password',
    'uses' => 'Auth\AuthController@reset_password'
]);

Route::any('update-new-password', [
    'as' => 'update-new-password',
    'uses' => 'Auth\AuthController@update_new_password'
]);


Route::group(['middleware' => 'auth'], function()
{

    /*Route::any('/', [
        'as' => 'dashboard',
        'uses' => 'HomeController@dashboard'
    ]);*/

    Route::any('dashboard', [
        'as' => 'dashboard',
        'uses' => 'HomeController@dashboard'
    ]);

    Route::any('all_routes_uri', [
        'as' => 'all_routes_uri',
        'uses' => 'HomeController@all_routes_uri'
    ]);

});

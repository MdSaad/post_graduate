<?php

Route::group( array(
	'prefix'     => 'admin',
	'modules'    => 'Admin',
	'namespace'  => 'Modules\Admin\Controllers',
	'middleware' => 'auth'
), function () {
	include 'saad_routes.php';
	/* country */
	Route::get( 'country', [
		'as'   => 'country',
		'uses' => 'CountryController@index'
	] );
	Route::any( "store-country", [
		"as"   => "store-country",
		"uses" => "CountryController@store"
	] );
	Route::any( "view-country/{id}", [
		"as"   => "view-country",
		"uses" => "CountryController@show"
	] );
	Route::any( "edit-country/{id}", [
		"as"   => "edit-country",
		"uses" => "CountryController@edit"
	] );
	Route::any( "update-country/{id}", [
		"as"   => "update-country",
		"uses" => "CountryController@update"
	] );
	Route::any( "delete-country/{id}", [
		"as"   => "delete-country",
		"uses" => "CountryController@delete"
	] );
	/* country */



} );
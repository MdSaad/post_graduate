<?php

Route::group( array(
	'prefix'     => 'ticketing',
	'modules'    => 'Ticketing',
	'namespace'  => 'Modules\Ticketing\Controllers',
	'middleware' => 'auth'
), function () {
	include 'saad_routes.php';
	include 'awolad_routes.php';
} );
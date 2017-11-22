<?php

Route::group( array(
	'prefix'     => 'report',
	'modules'    => 'Reports',
	'namespace'  => 'Modules\Reports\Controllers',
	'middleware' => 'auth'
), function () {
	include 'saad_routes.php';
} );
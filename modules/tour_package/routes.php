<?php

Route::group( array(
	'prefix'     => 'tour',
	'modules'    => 'Tour',
	'namespace'  => 'Modules\Tour\Controllers',
	'middleware' => 'auth'
), function () {
	include 'saad_routes.php';

} );
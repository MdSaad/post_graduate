<?php

/* expense-head */
Route::get( 'expense-head', [
	'as'   => 'expense-head',
	'uses' => 'ExpenseHeadController@index'
] );
Route::any( "store-expense-head", [
	"as"   => "store-expense-head",
	"uses" => "ExpenseHeadController@store"
] );
Route::any( "view-expense-head/{id}", [
	"as"   => "view-expense-head",
	"uses" => "ExpenseHeadController@show"
] );
Route::any( "edit-expense-head/{id}", [
	"as"   => "edit-expense-head",
	"uses" => "ExpenseHeadController@edit"
] );
Route::any( "update-expense-head/{id}", [
	"as"   => "update-expense-head",
	"uses" => "ExpenseHeadController@update"
] );
Route::any( "delete-expense-head/{id}", [
	"as"   => "delete-expense-head",
	"uses" => "ExpenseHeadController@delete"
] );
/* expense-head */

/* expense-head */
Route::get( 'expense-subhead', [
	'as'   => 'expense-subhead',
	'uses' => 'ExpenseSubHeadController@index'
] );
Route::any( "store-expense-subhead", [
	"as"   => "store-expense-subhead",
	"uses" => "ExpenseSubHeadController@store"
] );
Route::any( "view-expense-subhead/{id}", [
	"as"   => "view-expense-subhead",
	"uses" => "ExpenseSubHeadController@show"
] );
Route::any( "edit-expense-subhead/{id}", [
	"as"   => "edit-expense-subhead",
	"uses" => "ExpenseSubHeadController@edit"
] );
Route::any( "update-expense-subhead/{id}", [
	"as"   => "update-expense-subhead",
	"uses" => "ExpenseSubHeadController@update"
] );
Route::any( "delete-expense-subhead/{id}", [
	"as"   => "delete-expense-subhead",
	"uses" => "ExpenseSubHeadController@delete"
] );
/* expense-head */


Route::any( "check-expense-subhead/{id}/{name}", [
	"as"   => "check-expense-subhead",
	"uses" => "ExpenseSubHeadController@is_exists_subhead"
] );


/* Airlines Information */
Route::get( 'airlines', [
	'as'   => 'airlines',
	'uses' => 'AirlinesController@index'
] );
Route::any( "store-airlines", [
	"as"   => "store-airlines",
	"uses" => "AirlinesController@store"
] );
Route::any( "view-airlines/{id}", [
	"as"   => "view-airlines",
	"uses" => "AirlinesController@show"
] );
Route::any( "edit-airlines/{id}", [
	"as"   => "edit-airlines",
	"uses" => "AirlinesController@edit"
] );
Route::any( "update-airlines/{id}", [
	"as"   => "update-airlines",
	"uses" => "AirlinesController@update"
] );
Route::any( "delete-airlines/{id}", [
	"as"   => "delete-airlines",
	"uses" => "AirlinesController@delete"
] );
/* Airlines Information */


/**currencies**/

Route::get('currencies', [
	'as' => 'currencies',
	'uses' => 'CurrencyController@index'
]);

Route::any("store-currency", [
	"as"   => "store-currency",
	"uses" => "CurrencyController@store"
]);

Route::any("view-currency/{id}", [
	"as"   => "view-currency",
	"uses" => "CurrencyController@show"
]);

Route::any("edit-currency/{id}", [
	"as"   => "edit-currency",
	"uses" => "CurrencyController@edit"
]);

Route::any("update-currency/{id}", [
	"as"   => "update-currency",
	"uses" => "CurrencyController@update"
]);

Route::any("delete-currency/{id}", [
	"as"   => "delete-currency",
	"uses" => "CurrencyController@delete"
]);


/**Company**/

Route::get("company", [
	"as"   => "company",
	"uses" => "CompanyController@index"
]);

Route::any("store-company", [
	"as"   => "store-company",
	"uses" => "CompanyController@store"
]);

Route::any("view-company/{id}", [
	"as"   => "view-company",
	"uses" => "CompanyController@show"
]);

Route::any("edit-company/{id}", [
	"as"   => "edit-company",
	"uses" => "CompanyController@edit"
]);

Route::any("update-company/{id}", [
	"as"   => "update-company",
	"uses" => "CompanyController@update"
]);

Route::any("delete-company/{id}", [
	"as"   => "delete-company",
	"uses" => "CompanyController@delete"
]);




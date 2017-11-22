<?php
/**Expense Details**/

Route::get("expense-details", [
	"as"   => "expense-details",
	"uses" => "ExpenseDetailsController@index"
]);

Route::any("store-expense-details", [
	"as"   => "store-expense-details",
	"uses" => "ExpenseDetailsController@store"
]);

Route::any("view-expense-details/{id}", [
	"as"   => "view-expense-details",
	"uses" => "ExpenseDetailsController@show"
]);

Route::any("edit-expense-details/{id}", [
	"as"   => "edit-expense-details",
	"uses" => "ExpenseDetailsController@edit"
]);

Route::any("update-expense-details/{id}", [
	"as"   => "update-expense-details",
	"uses" => "ExpenseDetailsController@update"
]);

Route::any("delete-expense-details/{id}", [
	"as"   => "delete-expense-details",
	"uses" => "ExpenseDetailsController@delete"
]);

Route::any("get_subhead_by_headid/{id}", [
	"as"   => "get_subhead_by_headid",
	"uses" => "ExpenseDetailsController@get_expense_subhead_by_headid"
]);






<?php

/**Expense Head**/

Route::get("expenses", [
	"as"   => "expenses",
	"uses" => "ExpenseReportController@index"
]);
Route::any("generate-expense-information-report", [
	"as"   => "generate-expense-information-report",
	"uses" => "ExpenseReportController@generate_expense_information_report"
]);
Route::any("details-expense-information/{id}", [
	"as"   => "details-expense-information",
	"uses" => "ExpenseReportController@details_expense_information"
]);
Route::any("get-all-subhead/{id}", [
	"as"   => "get-all-subhead",
	"uses" => "ExpenseReportController@get_all_subhead"
]);

/**Ticket Information**/

Route::get("ticket-information", [
	"as"   => "ticket-information",
	"uses" => "TicketInformationReportController@index"
]);
Route::any("generate-ticket-information-report", [
	"as"   => "generate-ticket-information-report",
	"uses" => "TicketInformationReportController@generate_ticket_information_report"
]);
Route::any("details-ticket-information/{id}", [
	"as"   => "details-ticket-information",
	"uses" => "TicketInformationReportController@details_ticket_information"
]);


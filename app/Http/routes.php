<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');
Route::get('/overview', 'OverviewController@index');
Route::get('/budgetplan', 'BudgetplanController@index');

Route::get('home', function(){return Redirect::to('budget');});
Route::get('budget', 'BudgetController@index');

Route::pattern('id', '[0-9]+');
Route::get('plan/{id}', 'EntriesController@index');
Route::post('plan/{id}','EntriesController@saveEntry');

Route::post('/','BudgetController@saveBudget');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

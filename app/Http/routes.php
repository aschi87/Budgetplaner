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
Route::get('/welcome','OverviewController@welcome');
Route::get('/overview', 'OverviewController@index');
Route::get('/budgetplan', 'BudgetplanController@index');

Route::get('home', function(){return Redirect::to('welcome');});
Route::get('budget', 'BudgetController@index');


Route::pattern('id', '[0-9]+');
Route::get('plan/{id}', 'EntriesController@index');
Route::post('plan/{id}/saveEntry','EntriesController@saveEntry');
Route::post('plan/{id}/editEntry','EntriesController@editEntry');
Route::post('plan/{id}/saveCategory','EntriesController@saveCategory');
Route::post('plan/{id}/share','BudgetController@shareBudget');

Route::post('/budget','BudgetController@saveBudget');
Route::get('/deleteAll','BudgetController@deleteAllBudgets'); // Is it good to use a get?

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

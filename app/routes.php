<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});


Route::get('brand', 'PivotController@getall');
Route::get('brand/edit/{brand_id}', 'PivotController@edit');
Route::post('brand/create', 'PivotController@create');
Route::post('brand/update', 'PivotController@update');

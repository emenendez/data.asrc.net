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

Route::group(array('prefix' => 'api/v1'), function()
{
	Route::resource('teams', 'TeamsController', array('except' => array('edit', 'destroy')));
	Route::resource('incidents', 'IncidentsController', array('except' => array('edit', 'destroy')));
	Route::resource('callouts', 'CalloutsController', array('except' => array('edit', 'destroy')));
	Route::resource('responders', 'RespondersController', array('except' => array('edit', 'destroy')));
});

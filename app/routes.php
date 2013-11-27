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
	Route::resource('teams.callouts', 'TeamsCalloutsController', array('except' => array('edit', 'destroy')));
	Route::resource('incidents', 'IncidentsController', array('except' => array('edit', 'destroy')));
	Route::resource('incidents.callouts', 'IncidentsCalloutsController', array('except' => array('edit', 'destroy')));
	Route::resource('incidents.responders', 'IncidentsRespondersController', array('except' => array('edit', 'destroy')));
	Route::resource('incidents.tasks', 'IncidentsTasksController', array('except' => array('edit', 'destroy')));
	Route::resource('callouts', 'CalloutsController', array('except' => array('edit', 'destroy')));
	Route::resource('callouts.responders', 'CalloutsRespondersController', array('except' => array('edit', 'destroy')));
	Route::resource('responders', 'RespondersController', array('except' => array('edit', 'destroy')));
	Route::resource('responders.tasks', 'RespondersTasksController', array('except' => array('edit', 'destroy')));
	Route::resource('tasks', 'TasksController', array('except' => array('edit', 'destroy')));
	Route::resource('tasks.responders', 'TasksRespondersController', array('except' => array('edit', 'destroy')));
});

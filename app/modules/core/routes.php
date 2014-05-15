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
	return View::make('core::site.layouts.home');
});

Route::get('editor/{path?}', function($path = 'dashboard')
{

    return View::make('core::site.editor.' . $path);
});



Route::pattern('id', '[0-9]+');
Route::get('{model}/{id}/show', 'ApiController@getShow');
Route::get('{model}/{id}/edit', 'ApiController@getEdit');
Route::post('{model}/{id}/edit', 'ApiController@postEdit');
Route::put('{model}/{id}/edit', 'ApiController@putEdit');

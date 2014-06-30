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


Route::get('/', function () {
    return View::make('core::site.editor.dashboard');
});

Route::get('editor/{path?}', function ($path = 'dashboard') {

    return View::make('core::site.editor.' . $path);
});


Route::post('user/login', 'App\Modules\Core\Controllers\LoginController@login');
Route::get('user/login', function () {
    if (Session::has('session.token')) {
        return View::make('core::site.editor.dashboard');
    } else {
        return View::make('core::site.user.login');
    }
});
Route::get('user/logout', function () {
    Session::flush();
    return View::make('core::site.editor.dashboard');
});
Route::pattern('id', '[0-9]+');
Route::get('{model}/{id}/show', 'App\Modules\Core\Controllers\UserController@show');
Route::get('{model}/{id}/edit', 'App\Modules\Core\Controllers\UserController@getEdit');
//Route::post('{model}/{id}/edit', 'App\Modules\Core\Controllers\UserController@store');
Route::put('{model}/{id}/edit', 'App\Modules\Core\Controllers\UserController@update');

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


Route::group(array('before' => 'oauth'), function () {

    Route::get('/', function () {
        return View::make('core::site.editor.dashboard');
    });

    Route::get('editor/{path?}', function ($path = 'dashboard') {

        return View::make('core::site.editor.' . $path);
    });

    Route::resource(
        'user',
        'App\Modules\Core\Controllers\UserController'
    );
});

Route::post('login', 'App\Modules\Core\Controllers\LoginController@login');
Route::get('login', function () {
    if (Session::has('session.token')) {
        return View::make('core::site.editor.dashboard');
    } else {
        return View::make('core::site.user.login');
    }
});
Route::get('logout', function () {
    Session::flush();
    Auth::logout();
    return Redirect::to('/');
});

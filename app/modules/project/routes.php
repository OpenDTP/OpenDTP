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

Route::group(
    array('before' => 'oauth'),
    function () {
        Route::resource(
            'project',
            'App\Modules\Project\Controllers\ProjectController'
        );
        Route::get(
            'ticket/{id}',
            'App\Modules\Core\Controllers\ProjectController'
        );

    }
);

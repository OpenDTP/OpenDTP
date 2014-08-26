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
            'project/{project_id}/ticket/{id}',
            'App\Modules\Project\Controllers\TicketController@show'
        );

    }
);

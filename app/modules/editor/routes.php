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

//Route::group(
//    array('before' => 'oauth'),
//    function () {
//        Route::resource(
//            'project',
//            'App\Modules\Project\Controllers\ProjectController'
//        );
//    }
//);

Route::group(array('before' => 'oauth'), function () {

    Route::post(
        'editor/upload',
        'App\Modules\Editor\Controllers\EditorController@postUpload'
    );

    Route::get('/editor', function () {
        return View::make('editor::site.editor.editor');
    });

});

<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(
    function ($request) {
        //
    }
);


App::after(
    function ($request, $response) {
    }
);

App::error(function(Exception $exception)
{
    if (401 === $exception->getCode()) {
        Session::flash('error', 'global.unauthorized');
        return Redirect::to('/');
    }
});

Route::filter(
    'auth.basic',
    function () {
        return Auth::basic("login");
    }
);

Route::filter(
    'admin',
    function () {
    }
);

Route::filter('oauth', function () {
    if (is_null(Session::get('session.token'))) {
        return Redirect::to('login');
    }
});

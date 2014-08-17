<?php

namespace App\Modules\Core\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Modules\Core\Models\Api;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        $login = Input::get('login');
        $password = Input::get('password');

        $response = Api::oauth(
            [
              'username' => $login,
              'password' => $password,
              'client_id' => '0',
              'client_secret' => 'opendtp',
              'scope' => 'default',
              'grant_type' => 'password'
            ]
        );
        Session::put('session.token', $response->access_token);
        Session::put('session.username', $login);
        Session::flash('success', 'Welcome ' . $login);
        return Redirect::to('/');
    }
}

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
        if (Session::get('session.token')) {
            Redirect::to('/');
        }
        $login = Input::get('login');
        $password = Input::get('password');

        $response = Api::oauth(
            'http://192.168.57.101/oauth/access_token',
            [
              'username' => $login,
              'password' => $password,
              'client_id' => '0',
              'client_secret' => 'opendtp',
              'scope' => 'default',
              'grant_type' => 'password'
          ]
        );
        $response = json_decode($response);
        if (!isset($response->access_token)) {
            die('pas cool !');
        };
        Session::put('session.token', $response->access_token);
        Session::put('session.username', $login);
        Session::flash('success', 'Welcome ' . $login);
        return Redirect::to('/');
    }
}

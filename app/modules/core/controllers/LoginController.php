<?php

namespace App\Modules\Core\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\RedirectResponse\Redirector as Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Opendtp\Entity\User\UserEntity;
use Opendtp\Storage\User\UserRepository as User;
use App\Modules\Core\Models\Api;
use Illuminate\Session\Store as Session;

class LoginController extends Controller
{
    public function login()
    {
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
        $token = json_decode($response, true)['access_token'];
        //Session::put('session.token', $token);
        echo '<pre>' . print_r(Session::get('user.token'), true) . '</pre>';
        die;
    }
}

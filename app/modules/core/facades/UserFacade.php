<?php

namespace App\Modules\Core\Facades;

use Illuminate\Support\Facades\Facade;
use App\Modules\Core\Models\User;

class UserFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'User';
    }

    protected static function make($id)
    {
        $user = new User;
        $reponse = \Httpful\Reauest::get(Config::get(api_url) . '/' . $user->version . '/' . $user->service . '/' . $id)
        ->authenticateWith('admin', 'admin')->send();
        if ($response->code != 200) {
            throw ApiException("Error");
        }
        foreach ($response->data as $attribute => $value) {
            $user->$attribute = $value;
        }
        return $user;
    }
}

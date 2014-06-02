<?php

namespace Opendtp\Storage\User;

use App\Modules\Core\Models\Api;

class ApiUserRepository implements UserRepository
{
    public function all()
    {
        $reply = Api::get('all')->send();
        return $reply->body->data;
    }

    public function find($id)
    {
        $reply = Api::get($id)->send();
        return $reply->body->data;
    }

    public function create($input)
    {
        return Api::post($input);
    }
}

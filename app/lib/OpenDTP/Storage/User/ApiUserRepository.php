<?php

namespace Opendtp\Storage\User;

use App\Modules\Core\Models\Api;

class ApiUserRepository implements UserRepository
{
    public function all()
    {
        return Api::get('all')->send();
    }

    public function find($id)
    {
        return Api::get($id);
    }

    public function create($input)
    {
        return Api::post($input);
    }
}

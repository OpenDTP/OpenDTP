<?php

namespace Opendtp\Storage\User;

use App\Modules\Core\Models\Api;

class ApiUserRepository implements UserRepository
{
    public function all()
    {
        return Api::get('all');
    }

    public function find($id)
    {
        return Api::get($id);
    }

    public function update($input)
    {
        return Api::put($input, $input);
    }
    public function create($input)
    {
        return Api::post($input);
    }
}

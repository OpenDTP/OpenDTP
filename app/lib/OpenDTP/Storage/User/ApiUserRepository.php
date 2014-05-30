<?php

namespace OpenDTP\Storage\User;

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

    public function create($input)
    {
        return Api::post($input);
    }
}

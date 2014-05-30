<?php

namespace OpenDTP\Storage\User;

interface UserRepository
{

    public function all();

    public function find($id);

    public function create($input);
}

<?php

namespace Opendtp\Storage\User;

interface UserRepository
{

    public function all();

    public function find($id);

    public function create($input);
}

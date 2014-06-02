<?php

namespace Opendtp\Storage;

use Illuminate\Support\ServiceProvider;

class StorageServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'Opendtp\Storage\User\UserRepository',
            'Opendtp\Storage\User\ApiUserRepository'
        );
    }
}

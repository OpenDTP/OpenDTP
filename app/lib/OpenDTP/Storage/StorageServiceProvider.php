<?php

namespace OpenDTP\Storage;

use Illuminate\Support\ServiceProvider;

class StorageServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'OpenDTP\Storage\User\UserRepository',
            'OpenDTP\Storage\User\ApiUserRepository'
        );
    }
}

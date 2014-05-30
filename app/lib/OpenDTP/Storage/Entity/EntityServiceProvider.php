<?php

namespace OpenDTP\Entity;

use Illuminate\Validation\Factory;
use Illuminate\Support\ServiceProvider;
use OpenDTP\Entity\User\UserEntity;
use OpenDTP\Service\Validation\Laravel\User\UserCreateValidator;
use OpenDTP\Service\Validation\Laravel\User\UserUpdateValidator;

class EntityServiceProvider extends ServiceProvider
{

    /**
     * Register the binding
     *
     * @return void
     */
    public function register()
    {
        /**
         * User Entity
         *
         * @return OpenDTP\Entity\User\UserEntity
         */
        $this->app->bind('OpenDTP\Entity\User\UserEntity', function ($app) {
            return new UserEntity(
                $app->make('OpenDTP\Repository\User\UserRepository')
                // new UserCreateValidator( $app['validator'] ),
                // new UserUpdateValidator( $app['validator'] )
            );
        });
    }
}

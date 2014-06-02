<?php

namespace Opendtp\Entity;

use Illuminate\Validation\Factory;
use Illuminate\Support\ServiceProvider;
use Opendtp\Entity\User\UserEntity;
use Opendtp\Service\Validation\Laravel\User\UserCreateValidator;
use Opendtp\Service\Validation\Laravel\User\UserUpdateValidator;

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
         * @return Opendtp\Entity\User\UserEntity
         */
        $this->app->bind('Opendtp\Entity\User\UserEntity', function ($app) {
            return new UserEntity(
                $app->make('Opendtp\Repository\User\UserRepository')
                // new UserCreateValidator( $app['validator'] ),
                // new UserUpdateValidator( $app['validator'] )
            );
        });
    }
}

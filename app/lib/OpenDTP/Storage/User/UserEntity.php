<?php

namespace OpenDTP\Entity\User;

use OpenDTP\Entity\AbstractEntity;
use OpenDTP\Entity\EntityInterface;
use OpenDTP\Repository\User\UserRepository;
use OpenDTP\Service\Validation\Laravel\User\UserCreateValidator;
use OpenDTP\Service\Validation\Laravel\User\UserUpdateValidator;

class UserEntity extends AbstractEntity implements EntityInterface
{

    /**
     * @var OpenDTP\Repository\User\UserRepository
     */
    protected $repository;

    /**
     * @var OpenDTP\Service\Validation\Laravel\UserCreateValidator
     */
    protected $createValidator;

    /**
     * @var OpenDTP\Service\Validation\Laravel\UserUpdateValidator
     */
    protected $updateValidator;

    /**
     * @var Illuminate\Support\MessageBag
     */
    protected $errors;

    /**
     * Construct
     *
     * @param OpenDTP\Repository\User\UserRepository $repository
     * @param OpenDTP\Service\Validation\Laravel\UserCreateValidator $createValidator
     * @param OpenDTP\Service\Validation\Laravel\UserUpdateValidator $updateValidator
     */
     // , UserCreateValidator $createValidator, UserUpdateValidator $updateValidator
    public function __construct(UserRepository $repository)
     {
        $this->repository = $repository;
        // $this->createValidator = $createValidator;
        // $this->updateValidator = $updateValidator;
    }
}

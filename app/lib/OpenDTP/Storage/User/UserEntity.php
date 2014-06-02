<?php

namespace Opendtp\Entity\User;

use Opendtp\Entity\AbstractEntity;
use Opendtp\Entity\EntityInterface;
use Opendtp\Storage\User\UserRepository;
use Opendtp\Service\Validation\Laravel\User\UserCreateValidator;
use Opendtp\Service\Validation\Laravel\User\UserUpdateValidator;

class UserEntity extends AbstractEntity implements EntityInterface
{

    /**
     * @var Opendtp\Repository\User\UserRepository
     */
    protected $repository;

    /**
     * @var Opendtp\Service\Validation\Laravel\UserCreateValidator
     */
    protected $createValidator;

    /**
     * @var Opendtp\Service\Validation\Laravel\UserUpdateValidator
     */
    protected $updateValidator;

    /**
     * @var Illuminate\Support\MessageBag
     */
    protected $errors;

    /**
     * Construct
     *
     * @param Opendtp\Repository\User\UserRepository $repository
     * @param Opendtp\Service\Validation\Laravel\UserCreateValidator $createValidator
     * @param Opendtp\Service\Validation\Laravel\UserUpdateValidator $updateValidator
     */
     // , UserCreateValidator $createValidator, UserUpdateValidator $updateValidator
    public function __construct(UserRepository $repository)
     {
        $this->repository = $repository;
        // $this->createValidator = $createValidator;
        // $this->updateValidator = $updateValidator;
    }
}

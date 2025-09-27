<?php

namespace Src\admin\user\application;

use Src\admin\user\domain\contracts\UserRepositoryInterface;
use Src\admin\user\domain\value_objects\UserEmail;
use Src\admin\user\domain\value_objects\UserName;
use Src\admin\user\domain\entities\User;

class CreateUserUseCase
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(int $id, string $name, string $email)
    {
        $nameValueObject = new UserName($name);
        $emailValueObject = new UserEmail($email);

        // creando el usuario
        $user = new User($id, $nameValueObject, $emailValueObject);

        // guardar el usuario
        $this->userRepository->save($user);
    }
}
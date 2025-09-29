<?php

namespace Src\admin\user\infrastructure\repositories;

use Src\admin\user\domain\contracts\UserRepositoryInterface;
use Src\admin\user\domain\entities\User;
use App\Models\User as EloquentUser;
use Src\admin\user\domain\value_objects\UserEmail;
use Src\admin\user\domain\value_objects\UserName;

Class EloquentUserRepository implements UserRepositoryInterface
{
    public function findById(int $id): ?User
    {
        $user = EloquentUser::find($id);

        if (!$user) {
            # code...
            return null;
        }

        // si aparece el usuario se crea con forma de logica de negocio
        return new User(
            $user->id,
            new UserName($user->name),
            new UserEmail($user->email)
        );
    }

    public function save(User $user): void
    {
        EloquentUser::updatedOrCreate(
            ['id' => $user->id()],
            [
                'email' => $user->email()->value(),
                'username' => $user->name()->value(),
                
            ]
        );
    }
}
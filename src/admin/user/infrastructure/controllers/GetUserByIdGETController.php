<?php

namespace Src\admin\user\infrastructure\controllers;

use App\Http\Controllers\Controller;
use Src\admin\user\application\GetUserByIdUseCase;
use Src\admin\user\infrastructure\repositories\EloquentUserRepository;

final class GetUserByIdGETController extends Controller
{
    public function index($id)
    {
        // TODO: DDD Controller content here
        $eloquentUserRepository = new EloquentUserRepository();
        $getUserByIdUseCase = new GetUserByIdUseCase($eloquentUserRepository);

        $user = $getUserByIdUseCase($id);

        return response()->json([
            'status' => true,
            'data' => $user,
            'menssage' => 'success'
        ]);
    }
}

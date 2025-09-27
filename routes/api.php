<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix(prefix: 'admin/user')->group(base_path(path: 'src/admin/user/infrastructure/routes/api.php'));

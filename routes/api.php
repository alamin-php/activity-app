<?php

use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\Backend\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::apiResource('todos',TodoController::class)->middleware('auth:sanctum');
Route::get('get-user-todo',[TodoController::class, 'getTodoByUser'])->middleware('auth:sanctum');

Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('all-users', [AuthController::class, 'allUsers'])->name('users')->middleware('auth:sanctum');
    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware('auth:sanctum');
});

<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;
use App\Trait\ApiResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use ApiResponse;

    public $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(RegisterRequest $request)
    {
        $this->authService->register($request->validated());
        return ApiResponse::success(status: 'success', message: 'User registered successfully');
    }

    public function login(LoginRequest $request)
    {
        $response = $this->authService->login($request->validated());
        if (!$response['status']) {
            return response()->json(['message' => $response['message']], 401);
        }

        return response()->json([
            'message' => $response['message'],
            'data' => $response['data'],
        ], 200);
    }

    public function allUsers()
    {
        $users = $this->authService->allUsers();
        return ApiResponse::success(status: 'success', data: $users);
    }

    public function logout(Request $request)
    {
        $response = $this->authService->logout($request->user());

        if (!$response['status']) {
            return response()->json([
                'status' => false,
                'message' => $response['message'],
            ], 500);
        }

        return response()->json([
            'status' => true,
            'message' => $response['message'],
        ], 200);
    }
}

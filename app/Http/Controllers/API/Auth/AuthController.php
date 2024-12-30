<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;
use App\Trait\ApiResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use ApiResponse;

    public $authService;

    public function __construct(AuthService $authService){
        $this->authService = $authService;
    }

    public function register(RegisterRequest $request){
        $this->authService->register($request->validated());
        return ApiResponse::success(status: 'success', message: 'User registered successfully');
    }
}

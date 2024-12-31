<?php

namespace App\Services;

use App\Http\Requests\RegisterRequest;
use App\Interfaces\AuthInterface;
use App\Trait\ApiResponse;
use Illuminate\Support\Facades\Hash;
use Request;

class AuthService
{
    use ApiResponse;
    public $authInterface;
    /**
     * Create a new class instance.
     */
    public function __construct(AuthInterface $authInterface)
    {
        $this->authInterface = $authInterface;
    }
    /**
     * Create a new class instance.
     */
    public function register($request)
    {
        $this->authInterface->register($request);
    }

    public function login(array $credentials)
    {
        $user = $this->authInterface->findByEmail($credentials['email']);
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return [
                'status' => false,
                'message' => 'Invalid email or password',
            ];
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'status' => true,
            'message' => 'Login successful',
            'data' => [
                'user' => $user->only(['name', 'email']),
                'token' => $token,
            ],
        ];
    }

    public function allUsers(){
        return $this->authInterface->all();
    }

    public function logout($user){

        $isLoggedOut = $this->authInterface->logoutAllTokens($user);

        if (!$isLoggedOut) {
            return [
                'status' => false,
                'message' => 'Unable to log out. Please try again.',
            ];
        }

        return [
            'status' => true,
            'message' => 'Successfully logged out',
        ];
    }
}

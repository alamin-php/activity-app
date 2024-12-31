<?php

namespace App\Repositories;

use App\Interfaces\AuthInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthRepository implements AuthInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function login($request)
    {

    }
    public function register($request)
    {
        return User::create($request);
    }
    public function logoutAllTokens($user)
    {
        if ($user) {
            $user->tokens()->delete(); // Deletes all tokens for the user
            return true;
        }

        return false;
    }
    public function getUserById($id)
    {

    }
    public function findByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }
    public function all()
    {
        return User::all();
    }


}

<?php

namespace App\Repositories;

use App\Interfaces\AuthInterface;
use App\Models\User;

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
    public function logout()
    {

    }
    public function getUserById($id)
    {

    }


}

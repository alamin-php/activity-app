<?php

namespace App\Interfaces;

interface AuthInterface
{
    # Login
    public function login($request);

    # Register
    public function register($request);

    # Logout
    public function logout();

    # Get user by ID
    public function getUserById($id);
}

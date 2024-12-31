<?php

namespace App\Interfaces;

interface AuthInterface
{
    # Login
    public function login($request);

    # Register
    public function register($request);

    # Logout
    public function logoutAllTokens($user);

    # Get user by ID
    public function getUserById($id);

    # Find user by email address  (used for login)
    public function findByEmail(string $email);
    # Get user by
    public function all();

}

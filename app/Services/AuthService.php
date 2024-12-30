<?php

namespace App\Services;

use App\Http\Requests\RegisterRequest;
use App\Interfaces\AuthInterface;

class AuthService
{
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
}

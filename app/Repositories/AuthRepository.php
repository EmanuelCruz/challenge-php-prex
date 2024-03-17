<?php

namespace App\Repositories;

use App\Http\Controllers\Controller;
use App\Models\User;

class AuthRepository implements AuthRepositoryInterface
{

    protected $controller;

    public function __construct(Controller $controller)
    {
        $this->controller = $controller;
    }

    public function create(array $data): User
    {
        return User::create($data);
    }

    public function findByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }
}

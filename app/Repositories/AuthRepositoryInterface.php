<?php

namespace App\Repositories;

use App\Http\Requests\Auth\AuthRequest;
use Illuminate\Http\JsonResponse;

interface AuthRepositoryInterface
{
    public function register(AuthRequest $request): JsonResponse;
    public function login(AuthRequest $request): JsonResponse;
}

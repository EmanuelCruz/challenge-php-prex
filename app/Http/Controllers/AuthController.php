<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\AuthRequest;
use App\Models\User;
use App\Repositories\AuthRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    private $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }
    public function register(AuthRequest $request): JsonResponse
    {
        return $this->authRepository->register($request);
    }

    public function login(AuthRequest $request): JsonResponse
    {
        return $this->authRepository->login($request);
    }
}

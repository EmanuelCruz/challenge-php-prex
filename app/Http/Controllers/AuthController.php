<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    public function __construct(private AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();
            $result = $this->authService->register($data);
            return $this->sendResponse($result, 'User register successful');
        } catch (\Throwable $th) {
            $message = $th->getMessage();
            return $this->sendError($message, [], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $data = $request->validated();
        $result = $this->authService->login($data);

        if ($result) {
            return $this->sendResponse($result, 'User login successful');
        }

        return $this->sendError('Invalid credentials', [], Response::HTTP_UNAUTHORIZED);
    }
}

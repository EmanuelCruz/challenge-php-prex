<?php

namespace App\Repositories;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthRepository implements AuthRepositoryInterface
{

    protected $controller;

    public function __construct(Controller $controller)
    {
        $this->controller = $controller;
    }

    public function register(AuthRequest $request): JsonResponse
    {
        $data = $request->validated();

        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);

        $result['token'] = $user->createToken('authToken')->accessToken;
        $result['name'] = $user->name;

        return $this->controller->sendResponse($result, 'User register successful');
    }

    public function login(AuthRequest $request): JsonResponse
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $response['token'] = $user->createToken('authToken')->accessToken;
            $response['name'] = $user->name;
            return $this->controller->sendResponse($response, 'User login successful');
        } else {
            $response = 'Unauthorized.';
            return $this->controller->sendError($response, ['error' => 'Unauthorized']);
        }
    }
}

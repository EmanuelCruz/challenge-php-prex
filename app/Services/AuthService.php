<?php

namespace App\Services;

use App\Repositories\AuthRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthService
{

    public function __construct(private AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function register(array $data): array
    {
        DB::beginTransaction();
        try {
            $data['password'] = bcrypt($data['password']);
            $user = $this->authRepository->create($data);

            $result['token'] = $user->createToken('authToken')->accessToken;
            $result['name'] = $user->name;
            DB::commit();
            return $result;
        } catch (\Throwable $th) {
            DB::rollback();
            throw new \Exception($th->getMessage(), $th->getCode(), $th);
        }
    }

    public function login(array $data): ?array
    {
        $email = $data['email'];
        $password = $data['password'];

        $user = $this->authRepository->findByEmail($email);

        if ($user && Hash::check($password, $user->password)) {
            $tokenResult = $user->createToken('authToken');
            $token = $tokenResult->accessToken;

            return [
                'token' => $token,
                'name' => $user->name,
            ];
        }

        return null;
    }
}

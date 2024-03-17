<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseRequest;

class AuthRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required|string',
        ];
    }
}

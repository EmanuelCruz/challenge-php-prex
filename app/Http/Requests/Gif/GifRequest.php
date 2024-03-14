<?php

namespace App\Http\Requests\Gif;

use App\Http\Requests\BaseRequest;

class GifRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'query' => 'required|string',
            'limit'  => 'nullable|integer',
            'offset' => 'nullable|integer',
        ];
    }
}

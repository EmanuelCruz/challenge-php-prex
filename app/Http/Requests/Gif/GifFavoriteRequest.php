<?php

namespace App\Http\Requests\Gif;

use App\Http\Requests\BaseRequest;

class GifFavoriteRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'gif_id' => 'required|integer',
            'alias'  => 'required|string',
            'user_id' => 'required|integer',
        ];
    }
}

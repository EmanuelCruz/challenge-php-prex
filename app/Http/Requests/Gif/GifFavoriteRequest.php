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
            'gif_id' => 'required|string',
            'alias'  => 'required|string',
            'user_id' => 'required|integer|exists:users,id',
        ];
    }

    public function createFavoriteData(): array
    {
        $validated = collect(parent::validated());
        return $validated->only(['gif_id', 'alias'])->toArray();
    }
}

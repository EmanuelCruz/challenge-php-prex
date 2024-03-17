<?php

namespace App\Http\Requests\Favorite;

use Illuminate\Foundation\Http\FormRequest;

class FavoriteRequest extends FormRequest
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

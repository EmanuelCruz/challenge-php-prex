<?php

namespace App\Http\Requests\Gif;

use App\Http\Requests\BaseRequest;
use Illuminate\Support\Collection;

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
            'user_id' => 'required|integer',
        ];
    }

    public function createFavoriteData(): array
    {
        $validated = new Collection(parent::validated());
        return $validated->only(['gif_id', 'alias'])->toArray();
    }
}

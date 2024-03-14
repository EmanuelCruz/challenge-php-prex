<?php

namespace App\Repositories;

use App\Http\Requests\Gif\GifFavoriteRequest;

interface GifRepositoryInterface
{
    public function searchByText(array $data);
    public function searchByID(string $gif_id);
    public function saveFavorite(GifFavoriteRequest $request);
}

<?php

namespace App\Repositories;

use App\Http\Requests\Gif\GifFavoriteRequest;

interface GifRepositoryInterface
{
    public function searchByText(array $data): array;
    public function searchByID(string $gif_id): array;
    public function saveFavorite(GifFavoriteRequest $request): void;
}

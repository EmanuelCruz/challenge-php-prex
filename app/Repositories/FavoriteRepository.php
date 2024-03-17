<?php

namespace App\Repositories;

use App\Models\Favorite;

class FavoriteRepository implements FavoriteRepositoryInterface
{
    public function create(array $data): Favorite
    {
        return Favorite::create($data);
    }
}

<?php

namespace App\Repositories;

use App\Models\Favorite;

interface FavoriteRepositoryInterface
{
    public function create(array $data): Favorite;
}

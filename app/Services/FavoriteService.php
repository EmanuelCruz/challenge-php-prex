<?php

namespace App\Services;

use App\Repositories\FavoriteRepository;
use Illuminate\Support\Facades\DB;

class FavoriteService
{
    public function __construct(private FavoriteRepository $favoriteRepository)
    {
        $this->favoriteRepository = $favoriteRepository;
    }

    public function saveFavorite(array $data): bool
    {
        DB::beginTransaction();

        try {
            $this->favoriteRepository->create($data);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}

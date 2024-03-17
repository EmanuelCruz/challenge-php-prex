<?php

namespace App\Repositories;

interface GifRepositoryInterface
{
    public function search(array $queryParams): array;
    public function searchById(string $id, array $queryParams): array;
}

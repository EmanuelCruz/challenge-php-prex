<?php

namespace App\Repositories;

interface GifRepositoryInterface
{
    public function searchByText(array $data);
    public function searchByID(string $gif_id);
}

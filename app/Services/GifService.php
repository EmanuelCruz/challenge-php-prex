<?php

namespace App\Services;

use App\Repositories\GifRepository;

class GifService
{
    public function __construct(private GifRepository $gifRepository)
    {
        $this->gifRepository = $gifRepository;
    }

    public function searchGifs(array $data): array
    {
        $queryParams = [
            'api_key' => config('giphy.api_key'),
            'q' => $data['query'],
            'limit' => $data['limit'] ?? null,
            'offset' => $data['offset'] ?? null,
        ];

        return $this->gifRepository->search($queryParams);
    }

    public function searchGifById(string $id): array
    {
        $queryParams = [
            'api_key' => config('giphy.api_key'),
        ];

        return $this->gifRepository->searchById($id, $queryParams);
    }
}

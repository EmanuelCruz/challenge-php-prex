<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Http;

class GifRepository implements GifRepositoryInterface
{

    public function search(array $queryParams): array
    {
        $url = config('giphy.url.search');
        $response = Http::withQueryParameters($queryParams)->get($url);
        return $response->json();
    }

    public function searchById(string $id, array $queryParams): array
    {
        $urlParams = ['id' => $id];
        $url = config('giphy.url.search-by-id');
        $response = Http::withUrlParameters($urlParams)
            ->withQueryParameters($queryParams)
            ->get($url);

        return $response->json();
    }
}

<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Http;

class GiphyRepository implements GifRepositoryInterface
{
    public function searchByText(array $data): array
    {
        $queryParams = [
            'api_key' => config('giphy.api_key'),
            'q' => $data['query'],
            'limit' => $data['limit'],
            'offset' => $data['offset'],
        ];
        $url = config('giphy.url.search');
        $response = Http::withQueryParameters($queryParams)->get($url);
        return $response->json();
    }
}

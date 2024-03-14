<?php

namespace App\Repositories;

use App\Http\Requests\Gif\GifFavoriteRequest;
use App\Models\Favorite;
use App\Models\User;
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

    public function searchByID(string $id): array
    {
        $urlParams = ['id' => $id];
        $queryParams = [
            'api_key' => config('giphy.api_key')
        ];
        $url = config('giphy.url.search-by-id');
        $response = Http::withUrlParameters($urlParams)->withQueryParameters($queryParams)->get($url);
        return $response->json();
    }

    public function saveFavorite(GifFavoriteRequest $request): void
    {
        $data = $request->validated();
        $favorite = Favorite::create($request->createFavoriteData());
        $user = User::find($data['user_id']);
        $user->favorites()->attach($favorite['id']);
    }
}

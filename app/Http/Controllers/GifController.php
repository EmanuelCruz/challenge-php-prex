<?php

namespace App\Http\Controllers;

use App\Http\Requests\Gif\GifRequest;
use Illuminate\Http\JsonResponse;
use App\Services\GifService;

class GifController extends Controller
{
    public function __construct(private GifService $gifService)
    {
        $this->gifService = $gifService;
    }

    public function searchGifs(GifRequest $request): JsonResponse
    {
        $data = $request->validated();
        $gifs = $this->gifService->searchGifs($data);
        return response()->json($gifs);
    }

    public function searchGifById(string $id): JsonResponse
    {
        $gif = $this->gifService->searchGifById($id);
        return response()->json($gif);
    }
}

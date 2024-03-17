<?php

namespace App\Http\Controllers;

use App\Http\Requests\Favorite\FavoriteRequest;
use App\Services\FavoriteService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class FavoriteController extends Controller
{

    public function __construct(private FavoriteService $favoriteService)
    {
        $this->favoriteService = $favoriteService;
    }

    public function saveFavorite(FavoriteRequest $request): JsonResponse
    {
        $data = $request->createFavoriteData();

        try {
            $this->favoriteService->saveFavorite($data);
            return $this->sendResponse([], 'Favorite saved successfully');
        } catch (\Throwable $th) {
            $message = $th->getMessage();
            return $this->sendError($message, [], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

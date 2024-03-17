<?php

namespace App\Http\Controllers;

use App\Http\Requests\Gif\GifRequest;
use App\Repositories\GifRepositoryInterface;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Gif\GifFavoriteRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class GifController extends Controller
{

    private $gifRepository;

    public function __construct(GifRepositoryInterface $gifRepository)
    {
        $this->gifRepository = $gifRepository;
    }

    public function searchByText(GifRequest $request): JsonResponse
    {
        $data = $request->validated();
        $result = $this->gifRepository->searchByText($data);
        return response()->json($result);
    }

    public function searchByID(string $id): JsonResponse
    {
        $result = $this->gifRepository->searchById($id);
        return response()->json($result);
    }

    public function saveFavorite(GifFavoriteRequest $request): JsonResponse
    {
        DB::beginTransaction();
        try {
            $this->gifRepository->saveFavorite($request);
            DB::commit();
            return $this->sendError($message, [], Response::HTTP_INTERNAL_SERVER_ERROR);
        } catch (\Throwable $th) {
            DB::rollback();
            $message = $th->getMessage();
            return $this->sendError($message, [], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

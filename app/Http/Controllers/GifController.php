<?php

namespace App\Http\Controllers;

use App\Http\Requests\Gif\GifRequest;
use App\Repositories\GifRepositoryInterface;
use Illuminate\Http\JsonResponse;

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

}
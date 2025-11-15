<?php

declare(strict_types=1);

namespace App\Http\Controllers\Allergie;

use App\Http\Resources\AllergieResourceCollection;
use App\Services\Allergie\GetAllergieListService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

final class GetAllergieListController
{
    public function __invoke(): JsonResponse
    {
        try {
            $service = app(GetAllergieListService::class);
            $allergieList = $service();

            $allergieResourceCollection = new AllergieResourceCollection($allergieList);

            return response()->json($allergieResourceCollection, Response::HTTP_OK);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'Allergie一覧の取得に失敗しました'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

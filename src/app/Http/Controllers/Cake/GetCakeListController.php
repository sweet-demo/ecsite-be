<?php

namespace App\Http\Controllers\Cake;

use App\Http\Resources\CakeResourceCollection;
use App\Services\Cake\GetCakeListService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

final class GetCakeListController
{
    /**
     * ケーキ一覧を取得
     */
    public function __invoke(Request $request): JsonResponse
    {
        $service = app(GetCakeListService::class);

        try {
            $cakes = $service((int) $request->input('page', 1));

            $cakeResourceCollection = new CakeResourceCollection($cakes);

            return response()->json($cakeResourceCollection, Response::HTTP_OK);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'ケーキ一覧の取得に失敗しました'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

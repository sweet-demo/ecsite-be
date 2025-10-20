<?php

namespace App\Http\Controllers\Cake;

use App\Http\Resources\CakeResourceCollection;
use App\Services\Cake\GetCakeListService;
use App\Services\Cake\GetCakeListServiceInputDto;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final class GetCakeListController
{
    /**
     * ケーキ一覧を取得
     */
    public function __invoke(Request $request): JsonResponse
    {
        $inputDto = new GetCakeListServiceInputDto(
            page: (int) $request->input('page', 1),
        );

        $service = app(GetCakeListService::class);

        $outputDto = $service($inputDto);

        $cakeResourceCollection = new CakeResourceCollection($outputDto->cakes);

        return response()->json($cakeResourceCollection, Response::HTTP_OK);
    }
}

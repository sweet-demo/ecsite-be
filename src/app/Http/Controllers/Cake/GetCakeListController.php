<?php

namespace App\Http\Controllers\Cake;

use App\Http\Controllers\BaseController;
use App\Services\Cake\GetCakeListService;
use App\Services\Cake\GetCakeListServiceInputDto;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class GetCakeListController extends BaseController
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

        return $this->successResponse('ケーキ一覧を取得しました', $outputDto->cakes);
    }
}

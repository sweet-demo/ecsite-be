<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\User\Step3Request;
use App\Services\User\AllergieService;
use Illuminate\Support\Facades\Log;

final class Step3Controller
{
    public function __invoke(Step3Request $request): JsonResponse
    {
        try {
            $allergieService = app(AllergieService::class);
            $allergieService(
                $request->input('allergies', []),
            );

            return response()->json(['message' => 'アレルギーの保存に成功しました'], Response::HTTP_OK);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'アレルギーの保存に失敗しました'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

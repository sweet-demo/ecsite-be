<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Requests\User\Step2Request;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;
use App\Services\User\UserAddressService;

final class Step2Controller
{
    public function __invoke(Step2Request $request): JsonResponse
    {
        $userAddressService = app(UserAddressService::class);

        try {
            $userAddressService(
                $request->input('zip_code'),
                $request->input('prefecture'),
                $request->input('municipality'),
                $request->input('town'),
                $request->input('street'),
            );

            return response()->json(['message' => 'Step2が完了しました'], Response::HTTP_OK);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'Step2に失敗しました'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

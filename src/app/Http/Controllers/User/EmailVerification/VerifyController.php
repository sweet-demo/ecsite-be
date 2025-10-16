<?php

namespace App\Http\Controllers\User\EmailVerification;

use App\Services\User\EmailVerification\VerifyService;
use App\Services\User\EmailVerification\VerifyServiceInputDto;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final class VerifyController
{
    /**
     * メール認証
     */
    public function __invoke(Request $request): JsonResponse
    {
        $verifyService = app(VerifyService::class);

        try {
            $inputDto = new VerifyServiceInputDto($request->query('token'));
            $verifyService($inputDto);

            return response()->json(['message' => 'メール認証が完了しました'], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

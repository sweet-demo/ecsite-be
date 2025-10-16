<?php

namespace App\Http\Controllers\User\EmailVerification;

use App\Http\Requests\EmailVerificationRequest;
use App\Services\User\EmailVerification\ResendService;
use App\Services\User\EmailVerification\ResendServiceInputDto;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class ResendController
{
    /**
     * 認証メール再送信
     */
    public function __invoke(EmailVerificationRequest $request): JsonResponse
    {
        $resendService = app(ResendService::class);

        try {
            $inputDto = new ResendServiceInputDto($request->email);
            $resendService($inputDto);

            return response()->json(['message' => '認証メールを再送信しました'], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

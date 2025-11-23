<?php

namespace App\Http\Controllers\User\EmailVerification;

use App\Http\Requests\EmailVerificationRequest;
use App\Services\User\EmailVerification\ResendService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
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
            $resendService($request->input('email'));

            return response()->json(['message' => '認証メールを再送信しました'], Response::HTTP_OK);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => '認証メールの再送信に失敗しました'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

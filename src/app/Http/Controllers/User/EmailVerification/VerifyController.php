<?php

namespace App\Http\Controllers\User\EmailVerification;

use App\Services\User\EmailVerification\VerifyService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
            $verifyService($request->query('token'));

            return response()->json(['message' => 'メール認証が完了しました'], Response::HTTP_OK);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'メール認証に失敗しました'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

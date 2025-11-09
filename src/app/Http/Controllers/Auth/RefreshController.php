<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

final class RefreshController
{
    /**
     * トークンリフレッシュ
     */
    public function __invoke(): JsonResponse
    {
        try {
            $token = JWTAuth::refresh(JWTAuth::getToken());
            return response()->json(['token' => $token], Response::HTTP_OK);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'トークンリフレッシュに失敗しました'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

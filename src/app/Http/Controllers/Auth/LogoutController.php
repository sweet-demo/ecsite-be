<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

final class LogoutController
{
    /**
     * ログアウト
     */
    public function __invoke(): JsonResponse
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        return response()->json([
            'message' => 'ログアウトしました',
        ], Response::HTTP_OK);
    }
}

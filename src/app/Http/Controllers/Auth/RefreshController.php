<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\JsonResponse;
use Tymon\JWTAuth\Facades\JWTAuth;
use Symfony\Component\HttpFoundation\Response;

final class RefreshController
{
    /**
     * トークンリフレッシュ
     */
    public function __invoke(): JsonResponse
    {
        $token = JWTAuth::refresh(JWTAuth::getToken());
        return response()->json(['token' => $token], Response::HTTP_OK);
    }
}

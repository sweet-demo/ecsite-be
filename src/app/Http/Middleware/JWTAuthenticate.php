<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

final class JWTAuthenticate
{
    /**
     * JWTトークン認証
     */
    public function handle(Request $request, \Closure $next)
    {
        try {
            JWTAuth::parseToken()->authenticate();
            return $next($request);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => '認証に失敗しました'], Response::HTTP_UNAUTHORIZED);
        }
    }
}

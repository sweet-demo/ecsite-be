<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

final class JWTAuthenticate
{
    private function handleException(JWTException $e)
    {
        if ($e instanceof TokenExpiredException) {
            return response()->json([
                'success' => false,
                'message' => 'トークンの有効期限が切れています',
                'error' => $e->getMessage(),
            ], Response::HTTP_UNAUTHORIZED);
        }
        if ($e instanceof TokenInvalidException) {
            return response()->json([
                'success' => false,
                'message' => 'トークンが無効です',
                'error' => $e->getMessage(),
            ], Response::HTTP_UNAUTHORIZED);
        }
        if ($e instanceof TokenBlacklistedException) {
            return response()->json([
                'success' => false,
                'message' => 'トークンが無効化されています',
                'error' => $e->getMessage(),
            ], Response::HTTP_UNAUTHORIZED);
        }
        return response()->json([
            'success' => false,
            'message' => 'トークンエラーが発生しました',
            'error' => $e->getMessage(),
        ], Response::HTTP_UNAUTHORIZED);
    }

    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, \Closure $next)
    {
        try {
            JWTAuth::parseToken()->authenticate();
            return $next($request);
        } catch (JWTException $e) {
            return $this->handleException($e);
        }
    }
}

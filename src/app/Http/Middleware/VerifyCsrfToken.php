<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class VerifyCsrfToken
{
    /**
     * CSRFトークンを検証するミドルウェア
     */
    public function handle(Request $request, \Closure $next): Response
    {
        if (in_array($request->method(), ['GET', 'HEAD', 'OPTIONS'])) {
            return $next($request);
        }

        $token = $request->input('_token') ?: $request->header('X-CSRF-TOKEN');

        if (!$token || !is_string($token)) {
            return response()->json(['message' => 'CSRFトークンが不足しています', 'error' => 'CSRF token missing'], Response::HTTP_FORBIDDEN);
        }

        if (!hash_equals($request->session()->token(), $token)) {
            return response()->json(['message' => 'CSRFトークンが無効または不足しています', 'error' => 'CSRF token mismatch'], Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}

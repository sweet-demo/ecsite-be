<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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

        if (!Session::isStarted()) {
            Session::start();
        }

        $token = $request->input('_token') ?: $request->header('X-CSRF-TOKEN');
        $sessionToken = Session::token();

        if (!$token || !hash_equals($sessionToken, $token)) {
            return response()->json([
                'success' => false,
                'message' => 'CSRFトークンが無効または不足しています',
                'error' => 'CSRF token mismatch',
            ], Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}

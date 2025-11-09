<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

final class LoginController
{
    /**
     * ログイン
     */
    public function __invoke(LoginRequest $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['message' => '認証情報が正しくありません'], Response::HTTP_UNAUTHORIZED);
            }

            return response()->json(['token' => $token], Response::HTTP_OK);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'ログインに失敗しました'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

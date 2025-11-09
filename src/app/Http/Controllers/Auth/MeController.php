<?php

namespace App\Http\Controllers\Auth;

use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

final class MeController
{
    /**
     * ユーザー情報取得
     */
    public function __invoke(): JsonResponse
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();

            if (!$user) {
                return response()->json(['message' => 'ユーザーが見つかりません'], Response::HTTP_NOT_FOUND);
            }

            $userResource = new UserResource($user);

            return response()->json($userResource, Response::HTTP_OK);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'ユーザー情報の取得に失敗しました'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

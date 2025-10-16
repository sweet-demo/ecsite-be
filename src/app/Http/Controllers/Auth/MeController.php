<?php

namespace App\Http\Controllers\Auth;

use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

final class MeController
{
    /**
     * ユーザー情報取得
     */
    public function __invoke(): JsonResponse
    {
        $user = JWTAuth::parseToken()->authenticate();

        if (!$user) {
            return response()->json([
                'message' => 'ユーザーが見つかりません',
            ], Response::HTTP_NOT_FOUND);
        }

        $userResource = new UserResource($user);

        return response()->json($userResource, Response::HTTP_OK);
    }
}

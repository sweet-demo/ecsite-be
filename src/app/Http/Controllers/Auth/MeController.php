<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

final class MeController extends BaseController
{
    /**
     * ユーザー情報取得
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke()
    {
        $user = JWTAuth::parseToken()->authenticate();

        if (!$user) {
            return $this->errorResponse('ユーザーが見つかりません', Response::HTTP_NOT_FOUND);
        }

        return $this->successResponse('ユーザー情報を取得しました', ['user' => $user]);
    }
}

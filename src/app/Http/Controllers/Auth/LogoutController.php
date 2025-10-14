<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use Illuminate\Http\JsonResponse;
use Tymon\JWTAuth\Facades\JWTAuth;

final class LogoutController extends BaseController
{
    /**
     * ログアウト
     */
    public function __invoke(): JsonResponse
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        return $this->successResponse('ログアウトしました');
    }
}

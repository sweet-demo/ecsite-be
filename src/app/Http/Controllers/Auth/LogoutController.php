<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use Tymon\JWTAuth\Facades\JWTAuth;

final class LogoutController extends BaseController
{
    /**
     * ログアウト
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke()
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        return $this->successResponse('ログアウトしました');
    }
}

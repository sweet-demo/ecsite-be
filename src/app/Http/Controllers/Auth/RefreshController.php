<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use Illuminate\Http\JsonResponse;
use Tymon\JWTAuth\Facades\JWTAuth;

final class RefreshController extends BaseController
{
    /**
     * トークンリフレッシュ
     */
    public function __invoke(): JsonResponse
    {
        $token = JWTAuth::refresh(JWTAuth::getToken());
        return $this->successResponse('トークンをリフレッシュしました', ['token' => $token]);
    }
}

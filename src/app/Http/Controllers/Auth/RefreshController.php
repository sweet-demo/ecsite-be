<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use Tymon\JWTAuth\Facades\JWTAuth;

final class RefreshController extends BaseController
{
    /**
     * トークンリフレッシュ
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke()
    {
        $token = JWTAuth::refresh(JWTAuth::getToken());
        return $this->successResponse('トークンをリフレッシュしました', ['token' => $token]);
    }
}

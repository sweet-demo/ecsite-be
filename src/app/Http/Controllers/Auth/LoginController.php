<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

final class LoginController extends BaseController
{
    /**
     * ログイン
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            return $this->errorResponse('認証情報が正しくありません', Response::HTTP_UNAUTHORIZED);
        }

        $user = Auth::user();

        return $this->successResponse('ログインに成功しました', [
            'user' => $user,
            'token' => $token,
        ]);
    }
}

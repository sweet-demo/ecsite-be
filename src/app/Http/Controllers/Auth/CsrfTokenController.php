<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Session;

class CsrfTokenController extends Controller
{
    /**
     * CSRFトークンを生成して返す
     */
    public function __invoke(): JsonResponse
    {
        // セッションを開始（CSRFトークン生成に必要）
        if (!Session::isStarted()) {
            Session::start();
        }

        // CSRFトークンを生成
        $token = csrf_token();

        return response()->json([
            'success' => true,
            'data' => [
                'csrf_token' => $token,
                'token_name' => '_token',
            ],
            'message' => 'CSRFトークンが正常に生成されました',
        ]);
    }
}

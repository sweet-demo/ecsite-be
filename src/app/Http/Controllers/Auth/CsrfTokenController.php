<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CsrfTokenController extends Controller
{
    /**
     * CSRFトークンを生成して返す
     * 
     * 注意: LaravelのセッションベースのCSRFトークンは、
     * セッションが有効な間は同じトークンを返します。
     * これは正常な動作で、セキュリティ上問題ありません。
     */
    public function __invoke(Request $request): JsonResponse
    {
        if (!$request->session()->isStarted()) {
            $request->session()->start();
        }

        $token = $request->session()->token();

        return response()->json(['csrf_token' => $token, 'token_name' => '_token'], Response::HTTP_OK);
    }
}

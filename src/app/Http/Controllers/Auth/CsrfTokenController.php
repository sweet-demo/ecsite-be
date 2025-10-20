<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CsrfTokenController extends Controller
{
    /**
     * CSRFトークンを生成して返す
     */
    public function __invoke(): JsonResponse
    {
        if (!Session::isStarted()) {
            Session::start();
        }

        $token = csrf_token();

        return response()->json(['csrf_token' => $token, 'token_name' => '_token'], Response::HTTP_OK);
    }
}

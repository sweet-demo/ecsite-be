<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;

abstract class BaseController extends Controller
{
    /**
     * 成功レスポンスを返す
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function successResponse(string $message, $data = null, int $statusCode = Response::HTTP_OK)
    {
        $response = [
            'success' => true,
            'message' => $message,
        ];

        if (null !== $data) {
            $response['data'] = $data;
        }

        return response()->json($response, $statusCode);
    }

    /**
     * エラーレスポンスを返す
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function errorResponse(string $message, int $statusCode = Response::HTTP_BAD_REQUEST, ?string $error = null)
    {
        $response = [
            'success' => false,
            'message' => $message,
        ];

        if (null !== $error) {
            $response['error'] = $error;
        }

        return response()->json($response, $statusCode);
    }
}

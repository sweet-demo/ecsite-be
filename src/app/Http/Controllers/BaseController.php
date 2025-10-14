<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

abstract class BaseController extends Controller
{
    /**
     * 成功レスポンスを返す
     *
     * @param mixed|null $data
     */
    protected function successResponse(string $message, $data = null, int $statusCode = Response::HTTP_OK): JsonResponse
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
     */
    protected function errorResponse(string $message, int $statusCode = Response::HTTP_BAD_REQUEST, ?string $error = null): JsonResponse
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

<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\RegisterRequest;
use App\Services\User\RegisterService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

final class RegisterController
{
    /**
     * ユーザー登録
     */
    public function __invoke(RegisterRequest $request): JsonResponse
    {
        $registerService = app(RegisterService::class);

        try {
            $registerService(
                $request->email,
                $request->password,
            );

            return response()->json(['message' => 'ユーザー登録が完了しました'], Response::HTTP_OK);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'ユーザー登録に失敗しました'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

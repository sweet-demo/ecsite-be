<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\RegisterRequest;
use App\Services\User\RegisterService;
use App\Services\User\RegisterServiceInputDto;
use Illuminate\Http\JsonResponse;
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
            $inputDto = new RegisterServiceInputDto($request->email, $request->password);
            $registerService($inputDto);

            return response()->json(['message' => 'ユーザー登録が完了しました'], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

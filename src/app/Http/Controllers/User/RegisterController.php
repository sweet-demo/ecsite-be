<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Http\Requests\RegisterRequest;
use App\Services\User\RegisterService;
use App\Services\User\RegisterServiceInputDto;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class RegisterController extends BaseController
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

            return $this->successResponse(
                'ユーザー登録が完了しました。認証メールを送信しましたので、メールボックスをご確認ください。',
                [],
                Response::HTTP_OK
            );
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

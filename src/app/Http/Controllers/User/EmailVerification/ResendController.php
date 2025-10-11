<?php

namespace App\Http\Controllers\User\EmailVerification;

use App\Http\Controllers\BaseController;
use App\Http\Requests\EmailVerificationRequest;
use App\Services\User\EmailVerification\ResendService;
use App\Services\User\EmailVerification\ResendServiceInputDto;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class ResendController extends BaseController
{
    /**
     * 認証メール再送信
     */
    public function __invoke(EmailVerificationRequest $request): JsonResponse
    {
        $resendService = app(ResendService::class);

        try {
            $inputDto = new ResendServiceInputDto($request->email);
            $resendService($inputDto);

            return $this->successResponse('認証メールを再送信しました');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

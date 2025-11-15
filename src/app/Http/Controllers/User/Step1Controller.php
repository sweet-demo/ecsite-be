<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Requests\User\Step1Request;
use App\Services\User\PersonalInfoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

final class Step1Controller
{
    public function __invoke(Step1Request $request): JsonResponse
    {
        $personalInfoService = app(PersonalInfoService::class);

        try {
            $personalInfoService(
                $request->input('first_name'),
                $request->input('last_name'),
                $request->input('birthdate'),
                $request->input('tel1'),
                $request->input('tel2'),
                $request->input('tel3'),
            );

            return response()->json(['message' => 'Step1が完了しました'], Response::HTTP_OK);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'Step1に失敗しました'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }   
    }
}

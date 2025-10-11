<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Http\Requests\RegisterRequest;
use App\Mail\EmailVerificationMail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

final class RegisterController extends BaseController
{
    /**
     * ユーザー登録
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(RegisterRequest $request)
    {
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => User::STATUS_ACTIVE,
        ]);

        $verificationToken = $user->generateEmailVerificationToken();

        Mail::to($user->email)->send(new EmailVerificationMail($user, $verificationToken));

        return $this->successResponse(
            'ユーザー登録が完了しました。認証メールを送信しましたので、メールボックスをご確認ください。',
            [
                'user' => $user,
                'email_verification_required' => true,
            ],
            Response::HTTP_CREATED
        );
    }
}

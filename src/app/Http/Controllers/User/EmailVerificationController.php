<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Http\Requests\EmailVerificationRequest;
use App\Mail\EmailVerificationMail;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Mail;

final class EmailVerificationController extends BaseController
{
    /**
     * メール認証
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function verify(Request $request)
    {
        $token = $request->query('token');
        
        if (!$token) {
            return $this->errorResponse('認証トークンが指定されていません', Response::HTTP_BAD_REQUEST);
        }

        $user = User::where('email_verification_token', $token)->first();

        if (!$user) {
            return $this->errorResponse('無効な認証トークンです', Response::HTTP_BAD_REQUEST);
        }

        if ($user->isEmailVerified()) {
            return $this->errorResponse('このメールアドレスは既に認証済みです', Response::HTTP_BAD_REQUEST);
        }

        $user->markEmailAsVerified();

        return $this->successResponse('メール認証が完了しました', [
            'user' => $user,
        ]);
    }

    /**
     * 認証メール再送信
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function resend(EmailVerificationRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        // セキュリティのため、ユーザーの存在に関わらず同じレスポンスを返す
        if (!$user) {
            return $this->successResponse('認証メールを再送信しました');
        }

        if ($user->isEmailVerified()) {
            return $this->successResponse('認証メールを再送信しました');
        }

        $token = $user->generateEmailVerificationToken();

        Mail::to($user->email)->send(new EmailVerificationMail($user, $token));

        return $this->successResponse('認証メールを再送信しました');
    }
}
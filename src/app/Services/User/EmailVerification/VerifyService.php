<?php

namespace App\Services\User\EmailVerification;

use App\Models\User;

final class VerifyService
{
    /**
     * 認証メール再送信
     *
     * @throws \Exception
     */
    public function __invoke(string $token): void
    {
        if (!$token) {
            throw new \Exception('認証トークンが指定されていません');
        }

        $user = User::where('email_verification_token', $token)->first();

        if (!$user) {
            throw new \Exception('無効な認証トークンです');
        }

        if ($user->isEmailVerified()) {
            throw new \Exception('このメールアドレスは既に認証済みです');
        }

        $user->markEmailAsVerified();
    }
}

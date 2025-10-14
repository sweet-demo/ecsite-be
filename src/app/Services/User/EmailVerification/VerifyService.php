<?php

namespace App\Services\User\EmailVerification;

use App\Models\User;

final class VerifyServiceInputDto
{
    public string $token;

    public function __construct(string $token)
    {
        $this->token = $token;
    }
}

final class VerifyService
{
    /**
     * 認証メール再送信
     *
     * @throws \Exception
     */
    public function __invoke(VerifyServiceInputDto $inputDto): void
    {
        if (!$inputDto->token) {
            throw new \Exception('認証トークンが指定されていません');
        }

        $user = User::where('email_verification_token', $inputDto->token)->first();

        if (!$user) {
            throw new \Exception('無効な認証トークンです');
        }

        if ($user->isEmailVerified()) {
            throw new \Exception('このメールアドレスは既に認証済みです');
        }

        $user->markEmailAsVerified();
    }
}

<?php

namespace App\Services\User\EmailVerification;

use App\Models\User;
use App\Services\Mail\MailService;

final class ResendService
{
    private MailService $mailService;

    public function __construct(MailService $mailService)
    {
        $this->mailService = $mailService;
    }

    /**
     * 認証メール再送信
     *
     * @throws \Exception
     */
    public function __invoke(string $email): void
    {
        $user = User::where('email', $email)->first();

        if (!$user) {
            return;
        }

        if ($user->isEmailVerified()) {
            return;
        }

        $token = $user->generateEmailVerificationToken();

        $this->mailService->send($user->email, 'メール認証', 'emails.email_verification', [
            'token' => $token,
        ]);
    }
}

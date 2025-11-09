<?php

namespace App\Services\User\EmailVerification;

use App\Mail\EmailVerificationMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

final class ResendService
{
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

        Mail::to($user->email)->send(new EmailVerificationMail($user, $token));
    }
}

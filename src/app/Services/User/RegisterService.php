<?php

namespace App\Services\User;

use App\Models\User;
use App\Services\Mail\MailService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

final class RegisterService
{
    private User $user;
    private MailService $mailService;

    public function __construct(User $user, MailService $mailService)
    {
        $this->user = $user;
        $this->mailService = $mailService;
    }

    /**
     * ユーザー登録
     *
     * @throws \Exception
     */
    public function __invoke(string $email, string $password): void
    {
        try {
            DB::beginTransaction();

            $user = $this->user->where('email', $email)
                ->whereNotNull('email_verified_at')
                ->first();

            if ($user) {
                $this->mailService->send($email, 'メール認証', 'emails.already-registered', [
                    'user' => $user,
                ]);
                return;
            }

            $this->user->where('email', $email)
                ->whereNull('email_verified_at')
                ->delete();

            $userCreated = $this->user->create([
                'email' => $email,
                'password' => Hash::make($password),
                'status' => User::STATUS_ACTIVE,
            ]);

            $verificationToken = $userCreated->generateEmailVerificationToken();

            // TODO: メール認証フロントページを完成させる
            $this->mailService->send($userCreated->email, 'メール認証', 'emails.email-verification', [
                'user' => $userCreated,
                'verificationUrl' => config('app.frontend_url') . '/user/verify/' . $verificationToken,
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}

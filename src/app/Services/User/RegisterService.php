<?php

namespace App\Services\User;

use App\Mail\AlreadyRegisteredMail;
use App\Mail\EmailVerificationMail;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

final class RegisterService
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * ユーザー登録
     *
     * @throws \Exception
     */
    public function __invoke(string $email, string $password, string $password_confirmation): void
    {
        if ($password !== $password_confirmation) {
            throw new \Exception('パスワードの確認が一致しません');
        }

        try {
            DB::beginTransaction();

            $user = $this->user->where('email', $email)
                ->whereNotNull('email_verified_at')
                ->first();

            if ($user) {
                Mail::to($email)->send(new AlreadyRegisteredMail($user));
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

            Mail::to($userCreated->email)->send(new EmailVerificationMail($userCreated, $verificationToken));

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}

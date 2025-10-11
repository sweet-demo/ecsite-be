<?php

namespace App\Services\User;

use App\Mail\AlreadyRegisteredMail;
use App\Mail\EmailVerificationMail;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

final class RegisterServiceInputDto
{
    public string $email;
    public string $password;

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }
}

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
    public function __invoke(RegisterServiceInputDto $inputDto): void
    {
        try {
            DB::beginTransaction();

            $user = $this->user->where('email', $inputDto->email)
                ->whereNotNull('email_verified_at')
                ->first();

            if ($user) {
                Mail::to($inputDto->email)->send(new AlreadyRegisteredMail($user));
                return;
            }

            $this->user->where('email', $inputDto->email)
                ->whereNull('email_verified_at')
                ->delete();

            $userCreated = $this->user->create([
                'email' => $inputDto->email,
                'password' => Hash::make($inputDto->password),
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

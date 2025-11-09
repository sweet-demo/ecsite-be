<?php

namespace App\Services\Mail;

use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;

final class MailService
{
    /**
     * メール送信
     */
    public function send(string $email, string $subject, string $view, array $data = []): void
    {
        Mail::to($email)->send(new SendEmail($subject, $view, $data));
    }
}

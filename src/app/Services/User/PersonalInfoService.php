<?php

declare(strict_types=1);

namespace App\Services\User;

use Illuminate\Support\Facades\Auth;

final class PersonalInfoService
{
    public function __invoke(
        string $first_name,
        string $last_name,
        string $birthdate,
        string $tel1,
        string $tel2,
        string $tel3,
    ): void {
        try {
            /** @var \App\Models\User $user */
            $user = Auth::user();

            $user->personalInfo()->updateOrCreate(
                [
                    'user_id' => $user->id,
                ],
                [
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'birthdate' => $birthdate,
                    'tel1' => $tel1,
                    'tel2' => $tel2,
                    'tel3' => $tel3,
                ]
            );
        } catch (\Exception $e) {
            throw $e;
        }
    }
}

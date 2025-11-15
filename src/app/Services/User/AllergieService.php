<?php

declare(strict_types=1);

namespace App\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

final class AllergieService
{
    public function __invoke(array $allergies): void
    {
        try {
            /** @var User $user */
            $user = Auth::user();

            $user->allergies()->sync($allergies);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            throw $e;
        }
    }
}

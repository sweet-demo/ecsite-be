<?php

declare(strict_types=1);

namespace App\Services\User;

use Illuminate\Support\Facades\Auth;

final class UserAddressService
{
    public function __invoke(string $zip_code, string $prefecture, string $municipality, string $town, string $street): void
    {
        try {
            /** @var \App\Models\User $user */
            $user = Auth::user();
    
            $user->address()->updateOrCreate([
                'user_id' => $user->id,
            ], [
                'zip_code' => $zip_code,
                'prefecture' => $prefecture,
                'municipality' => $municipality,
                'town' => $town,
                'street' => $street,
            ]);
        } catch (\Exception $e) {
            throw $e;
        }   
    }
}

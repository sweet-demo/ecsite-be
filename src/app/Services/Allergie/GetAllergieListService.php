<?php

declare(strict_types=1);

namespace App\Services\Allergie;

use App\Models\Allergie;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

final class GetAllergieListService
{
    public function __invoke(): Collection
    {
        try {
            return Allergie::all();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            throw $e;
        }
    }
}

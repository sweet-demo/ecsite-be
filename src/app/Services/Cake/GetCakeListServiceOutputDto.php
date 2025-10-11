<?php

namespace App\Services\Cake;

use Illuminate\Pagination\LengthAwarePaginator;

final class GetCakeListServiceOutputDto
{
    public LengthAwarePaginator $cakes;

    public function __construct(LengthAwarePaginator $cakes)
    {
        $this->cakes = $cakes;
    }
}

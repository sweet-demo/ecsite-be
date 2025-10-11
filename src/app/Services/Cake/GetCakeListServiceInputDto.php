<?php

namespace App\Services\Cake;

final class GetCakeListServiceInputDto
{
    public int $page;

    public function __construct(int $page)
    {
        $this->page = $page;
    }
}

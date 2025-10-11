<?php

namespace App\Services\Cake;

use App\Models\Product;

final class GetCakeListService
{
    private const PER_PAGE = 10;

    /**
     * ケーキ一覧を取得
     */
    public function __invoke(GetCakeListServiceInputDto $inputDto): GetCakeListServiceOutputDto
    {
        $cakes = Product::select('id', 'name', 'image', 'base_price', 'size')
            ->with([
                'cakeInfo:product_id,catchphrase,calorie,description',
                'tags:id,name',
                'allergies:id,name',
            ])
            ->where('status', Product::STATUS_ON_SALE)
            ->paginate(self::PER_PAGE, ['*'], 'page', $inputDto->page);

        $cakes->getCollection()->transform(function ($cake) {
            $cake->image_url = $cake->image_url;
            return $cake;
        });

        return new GetCakeListServiceOutputDto(
            cakes: $cakes,
        );
    }
}

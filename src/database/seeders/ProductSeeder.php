<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;

class ProductSeeder extends Seeder
{
    public const PRODUCT_NAME_IMAGE_MAP = [
        // -- ホールケーキ --
        'スイートベリーケーキ' => [
            'image' => 'SweetBerryCake.jpg',
            'tags' => ['ホールケーキ'],
            'data' => [
                'name' => 'スイートベリーケーキ',
                'kind' => Product::KIND_CAKE,
                'status' => Product::STATUS_ON_SALE,
                'base_price' => 1000,
                'size' => 100,
            ],
            'cake_info' => [
                'catchphrase' => 'スイートベリーケーキ',
                'calorie' => 100,
                'description' => 'スイートベリーケーキ',
            ],
        ],
        'ストロベリーホールケーキ' => [
            'image' => 'StrawberryWholeCake1.jpg',
            'tags' => ['ホールケーキ'],
            'data' => [
                'name' => 'ストロベリーホールケーキ',
                'kind' => Product::KIND_CAKE,
                'status' => Product::STATUS_ON_SALE,
                'base_price' => 1000,
                'size' => 100,
            ],
            'cake_info' => [
                'catchphrase' => 'ストロベリーホールケーキ',
                'calorie' => 100,
                'description' => 'ストロベリーホールケーキ',
            ],
        ],
        'ストロベリームースケーキ' => [
            'image' => 'StrawberryMousseCake1.jpg',
            'tags' => ['ホールケーキ'],
            'data' => [
                'name' => 'ストロベリームースケーキ',
                'kind' => Product::KIND_CAKE,
                'status' => Product::STATUS_ON_SALE,
                'base_price' => 1000,
                'size' => 100,
            ],
            'cake_info' => [
                'catchphrase' => 'ストロベリームースケーキ',
                'calorie' => 100,
                'description' => 'ストロベリームースケーキ',
            ],
        ],
        'モンブランケーキ' => [
            'image' => 'MontBlancCake.jpg',
            'tags' => ['ホールケーキ'],
            'data' => [
                'name' => 'モンブランケーキ',
                'kind' => Product::KIND_CAKE,
                'status' => Product::STATUS_ON_SALE,
                'base_price' => 1000,
                'size' => 100,
            ],
            'cake_info' => [
                'catchphrase' => 'モンブランケーキ',
                'calorie' => 100,
                'description' => 'モンブランケーキ',
            ],
        ],
        'チョコレートホールケーキ' => [
            'image' => 'ChocolateWholeCake1.jpg',
            'tags' => ['ホールケーキ'],
            'data' => [
                'name' => 'チョコレートホールケーキ',
                'kind' => Product::KIND_CAKE,
                'status' => Product::STATUS_ON_SALE,
                'base_price' => 1000,
                'size' => 100,
            ],
            'cake_info' => [
                'catchphrase' => 'チョコレートホールケーキ',
                'calorie' => 100,
                'description' => 'チョコレートホールケーキ',
            ],
        ],
        // -- 期間限定 --
        'レモンムースタルト' => [
            'image' => 'LemonMousseTart.jpg',
            'tags' => ['期間限定'],
            'data' => [
                'name' => 'レモンムースタルト',
                'kind' => Product::KIND_CAKE,
                'status' => Product::STATUS_ON_SALE,
                'base_price' => 1000,
                'size' => 100,
            ],
            'cake_info' => [
                'catchphrase' => 'レモンムースタルト',
                'calorie' => 100,
                'description' => 'レモンムースタルト',
            ],
        ],
        // -- 新商品 --
        'ストロベリーモンブラン' => [
            'image' => 'StrawberryMont Blanc1.jpg',
            'tags' => ['新商品'],
            'data' => [
                'name' => 'ストロベリーモンブラン',
                'kind' => Product::KIND_CAKE,
                'status' => Product::STATUS_ON_SALE,
                'base_price' => 1000,
                'size' => 100,
            ],
            'cake_info' => [
                'catchphrase' => 'ストロベリーモンブラン',
                'calorie' => 100,
                'description' => 'ストロベリーモンブラン',
            ],
        ],
        // その他
        'アップルパイ' => [
            'image' => 'ApplePie1.jpg',
            'tags' => [],
            'data' => [
                'name' => 'アップルパイ',
                'kind' => Product::KIND_CAKE,
                'status' => Product::STATUS_ON_SALE,
                'base_price' => 1000,
                'size' => 100,
            ],
            'cake_info' => [
                'catchphrase' => 'アップルパイ',
                'calorie' => 100,
                'description' => 'アップルパイ',
            ],
        ],
        'ベリータルト' => [
            'image' => 'BerryTart.jpg',
            'tags' => [],
            'data' => [
                'name' => 'ベリータルト',
                'kind' => Product::KIND_CAKE,
                'status' => Product::STATUS_ON_SALE,
                'base_price' => 1000,
                'size' => 100,
            ],
            'cake_info' => [
                'catchphrase' => 'ベリータルト',
                'calorie' => 100,
                'description' => 'ベリータルト',
            ],
        ],
        'ビターマッチャケーキ' => [
            'image' => 'BitterMatchaCake.jpg',
            'tags' => [],
            'data' => [
                'name' => 'ビターマッチャケーキ',
                'kind' => Product::KIND_CAKE,
                'status' => Product::STATUS_ON_SALE,
                'base_price' => 1000,
                'size' => 100,
            ],
            'cake_info' => [
                'catchphrase' => 'ビターマッチャケーキ',
                'calorie' => 100,
                'description' => 'ビターマッチャケーキ',
            ],
        ],
        'ブルーベリーケーキ' => [
            'image' => 'BlueberryCake.jpeg',
            'tags' => [],
            'data' => [
                'name' => 'ブルーベリーケーキ',
                'kind' => Product::KIND_CAKE,
                'status' => Product::STATUS_ON_SALE,
                'base_price' => 1000,
                'size' => 100,
            ],
            'cake_info' => [
                'catchphrase' => 'ブルーベリーケーキ',
                'calorie' => 100,
                'description' => 'ブルーベリーケーキ',
            ],
        ],
        'ブルーベリーチーズケーキ' => [
            'image' => 'BlueberryCheesecake.jpeg',
            'tags' => [],
            'data' => [
                'name' => 'ブルーベリーチーズケーキ',
                'kind' => Product::KIND_CAKE,
                'status' => Product::STATUS_ON_SALE,
                'base_price' => 1000,
                'size' => 100,
            ],
            'cake_info' => [
                'catchphrase' => 'ブルーベリーチーズケーキ',
                'calorie' => 100,
                'description' => 'ブルーベリーチーズケーキ',
            ],
        ],
        'カヌレ' => [
            'image' => 'Canele.jpeg',
            'tags' => [],
            'data' => [
                'name' => 'カヌレ',
                'kind' => Product::KIND_CAKE,
                'status' => Product::STATUS_ON_SALE,
                'base_price' => 1000,
                'size' => 100,
            ],
            'cake_info' => [
                'catchphrase' => 'カヌレ',
                'calorie' => 100,
                'description' => 'カヌレ',
            ],
        ],
        'チーズケーキ' => [
            'image' => 'CheeseCake.jpeg',
            'tags' => [],
            'data' => [
                'name' => 'チーズケーキ',
                'kind' => Product::KIND_CAKE,
                'status' => Product::STATUS_ON_SALE,
                'base_price' => 1000,
                'size' => 100,
            ],
            'cake_info' => [
                'catchphrase' => 'チーズケーキ',
                'calorie' => 100,
                'description' => 'チーズケーキ',
            ],
        ],
        'チョコレートケーキ' => [
            'image' => 'ChocolateCake.jpeg',
            'tags' => [],
            'data' => [
                'name' => 'チョコレートケーキ',
                'kind' => Product::KIND_CAKE,
                'status' => Product::STATUS_ON_SALE,
                'base_price' => 1000,
                'size' => 100,
            ],
            'cake_info' => [
                'catchphrase' => 'チョコレートケーキ',
                'calorie' => 100,
                'description' => 'チョコレートケーキ',
            ],
        ],
        'チョコレートロールケーキ' => [
            'image' => 'ChocolateRollCake.jpg',
            'tags' => [],
            'data' => [
                'name' => 'チョコレートロールケーキ',
                'kind' => Product::KIND_CAKE,
                'status' => Product::STATUS_ON_SALE,
                'base_price' => 1000,
                'size' => 100,
            ],
            'cake_info' => [
                'catchphrase' => 'チョコレートロールケーキ',
                'calorie' => 100,
                'description' => 'チョコレートロールケーキ',
            ],
        ],
        'ガトーショコラ' => [
            'image' => 'GateauChocolat.jpg',
            'tags' => [],
            'data' => [
                'name' => 'ガトーショコラ',
                'kind' => Product::KIND_CAKE,
                'status' => Product::STATUS_ON_SALE,
                'base_price' => 1000,
                'size' => 100,
            ],
            'cake_info' => [
                'catchphrase' => 'ガトーショコラ',
                'calorie' => 100,
                'description' => 'ガトーショコラ',
            ],
        ],
        'ミニタルト' => [
            'image' => 'MiniTart.jpg',
            'tags' => [],
            'data' => [
                'name' => 'ミニタルト',
                'kind' => Product::KIND_CAKE,
                'status' => Product::STATUS_ON_SALE,
                'base_price' => 1000,
                'size' => 100,
            ],
            'cake_info' => [
                'catchphrase' => 'ミニタルト',
                'calorie' => 100,
                'description' => 'ミニタルト',
            ],
        ],
        'モンブラン' => [
            'image' => 'MontBlan1.jpg',
            'tags' => [],
            'data' => [
                'name' => 'モンブラン',
                'kind' => Product::KIND_CAKE,
                'status' => Product::STATUS_ON_SALE,
                'base_price' => 1000,
                'size' => 100,
            ],
            'cake_info' => [
                'catchphrase' => 'モンブラン',
                'calorie' => 100,
                'description' => 'モンブラン',
            ],
        ],
        'マスカットケーキ' => [
            'image' => 'MuscatCake.jpg',
            'tags' => [],
            'data' => [
                'name' => 'マスカットケーキ',
                'kind' => Product::KIND_CAKE,
                'status' => Product::STATUS_ON_SALE,
                'base_price' => 1000,
                'size' => 100,
            ],
            'cake_info' => [
                'catchphrase' => 'マスカットケーキ',
                'calorie' => 100,
                'description' => 'マスカットケーキ',
            ],
        ],
        'マスカットロールケーキ' => [
            'image' => 'MuscatRollCake.jpg',
            'tags' => [],
            'data' => [
                'name' => 'マスカットロールケーキ',
                'kind' => Product::KIND_CAKE,
                'status' => Product::STATUS_ON_SALE,
                'base_price' => 1000,
                'size' => 100,
            ],
            'cake_info' => [
                'catchphrase' => 'マスカットロールケーキ',
                'calorie' => 100,
                'description' => 'マスカットロールケーキ',
            ],
        ],
        'ナポレオンパイ' => [
            'image' => 'NapoleonPie.jpg',
            'tags' => [],
            'data' => [
                'name' => 'ナポレオンパイ',
                'kind' => Product::KIND_CAKE,
                'status' => Product::STATUS_ON_SALE,
                'base_price' => 1000,
                'size' => 100,
            ],
            'cake_info' => [
                'catchphrase' => 'ナポレオンパイ',
                'calorie' => 100,
                'description' => 'ナポレオンパイ',
            ],
        ],
        'オレンジパウンドケーキ' => [
            'image' => 'OrangePoundCake.jpg',
            'tags' => [],
            'data' => [
                'name' => 'オレンジパウンドケーキ',
                'kind' => Product::KIND_CAKE,
                'status' => Product::STATUS_ON_SALE,
                'base_price' => 1000,
                'size' => 100,
            ],
            'cake_info' => [
                'catchphrase' => 'オレンジパウンドケーキ',
                'calorie' => 100,
                'description' => 'オレンジパウンドケーキ',
            ],
        ],
        'ピーチケーキ' => [
            'image' => 'PeachCake.jpg',
            'tags' => [],
            'data' => [
                'name' => 'ピーチケーキ',
                'kind' => Product::KIND_CAKE,
                'status' => Product::STATUS_ON_SALE,
                'base_price' => 1000,
                'size' => 100,
            ],
            'cake_info' => [
                'catchphrase' => 'ピーチケーキ',
                'calorie' => 100,
                'description' => 'ピーチケーキ',
            ],
        ],
        'ザッハトルテ' => [
            'image' => 'Sachertorte.jpg',
            'tags' => [],
            'data' => [
                'name' => 'ザッハトルテ',
                'kind' => Product::KIND_CAKE,
                'status' => Product::STATUS_ON_SALE,
                'base_price' => 1000,
                'size' => 100,
            ],
            'cake_info' => [
                'catchphrase' => 'ザッハトルテ',
                'calorie' => 100,
                'description' => 'ザッハトルテ',
            ],
        ],
        'ショートケーキ' => [
            'image' => 'ShortCake.jpg',
            'tags' => [],
            'data' => [
                'name' => 'ショートケーキ',
                'kind' => Product::KIND_CAKE,
                'status' => Product::STATUS_ON_SALE,
                'base_price' => 1000,
                'size' => 100,
            ],
            'cake_info' => [
                'catchphrase' => 'ショートケーキ',
                'calorie' => 100,
                'description' => 'ショートケーキ',
            ],
        ],
        'スフレケーキ' => [
            'image' => 'SouffleCake.jpg',
            'tags' => [],
            'data' => [
                'name' => 'スフレケーキ',
                'kind' => Product::KIND_CAKE,
                'status' => Product::STATUS_ON_SALE,
                'base_price' => 1000,
                'size' => 100,
            ],
            'cake_info' => [
                'catchphrase' => 'スフレケーキ',
                'calorie' => 100,
                'description' => 'スフレケーキ',
            ],
        ],
        'ティーシフォンケーキ' => [
            'image' => 'TeaChiffonCake.jpg',
            'tags' => [],
            'data' => [
                'name' => 'ティーシフォンケーキ',
                'kind' => Product::KIND_CAKE,
                'status' => Product::STATUS_ON_SALE,
                'base_price' => 1000,
                'size' => 100,
            ],
            'cake_info' => [
                'catchphrase' => 'ティーシフォンケーキ',
                'calorie' => 100,
                'description' => 'ティーシフォンケーキ',
            ],
        ],
    ];

    public function run(): void
    {
        foreach (self::PRODUCT_NAME_IMAGE_MAP as $productName => $productInfo) {
            $imagePath = database_path('seeders/CakeImages/'.$productInfo['image']);

            $uploadedImage = new UploadedFile($imagePath, basename($imagePath), mime_content_type($imagePath), null, true);

            $productInfo['data']['image'] = $uploadedImage->store('products', 'public');

            $product = Product::create($productInfo['data']);

            $tagsIds = Tag::whereIn('name', $productInfo['tags'])->get()->pluck('id');
            $product->tags()->attach($tagsIds);

            $product->cakeInfo()->create($productInfo['cake_info']);
        }
    }
}

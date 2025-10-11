<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run()
    {
        $tags = [
            ['name' => 'ホールケーキ'],
            ['name' => '期間限定'],
            ['name' => '新商品'],
        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Allergie;

class AllergieSeeder extends Seeder
{
    public function run()
    {
        $specificRawMaterialAllergies = [
            ['name' => '卵'],
            ['name' => '牛乳'],
            ['name' => '小麦'],
            ['name' => 'くるみ'],
            ['name' => '落花生（ピーナッツ）'],
            ['name' => 'えび'],
            ['name' => 'かに'],
            ['name' => 'そば'],
        ];

        $recommendedDisplayAllergies = [
            ['name' => 'アーモンド'],
            ['name' => 'オレンジ'],
            ['name' => 'カシューナッツ'],
            ['name' => 'キウイフルーツ'],
            ['name' => 'バナナ'],
            ['name' => 'マカダミアナッツ'],
            ['name' => 'もも'],
            ['name' => 'りんご'],
            ['name' => 'ゼラチン'],
            ['name' => 'あわび'],
            ['name' => 'イカ'],
            ['name' => 'いくら'],
            ['name' => '牛肉'],
            ['name' => 'ごま'],
            ['name' => 'さけ'],
            ['name' => 'さば'],
            ['name' => '大豆'],
            ['name' => '鶏肉'],
            ['name' => '豚肉'],
            ['name' => 'ヤマイモ'],
        ];

        // 特定原材料8品目
        foreach ($specificRawMaterialAllergies as $allergie) {
            Allergie::create(['kind' => Allergie::SPECIFIC_RAW_MATERIAL, 'name' => $allergie['name']]);
        }

        // 特定原材料8品目以外 (表示推奨レベル)
        foreach ($recommendedDisplayAllergies as $allergie) {
            Allergie::create(['kind' => Allergie::RECOMMENDED_DISPLAY, 'name' => $allergie['name']]);
        }
    }
}

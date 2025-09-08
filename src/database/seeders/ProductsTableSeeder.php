<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            ['name' => 'キウイ', 'price' => 800, 'image_path' => 'fruits-img/kiwi.png'],
            ['name' => 'ストロベリー', 'price' => 1200, 'image_path' => 'fruits-img/strawberry.png'],
            ['name' => 'オレンジ', 'price' => 850, 'image_path' => 'fruits-img/orange.png'],
            ['name' => 'スイカ', 'price' => 700, 'image_path' => 'fruits-img/watermelon.png'],
            ['name' => 'ピーチ', 'price' => 1000, 'image_path' => 'fruits-img/peach.png'],
            ['name' => 'シャインマスカット', 'price' => 1400, 'image_path' => 'fruits-img/muscat.png'],
        ]);
    }
}

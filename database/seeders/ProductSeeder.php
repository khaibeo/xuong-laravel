<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductGallery;
use App\Models\ProductSize;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tag::factory(15)->create();

        // foreach (['S', 'M', 'L', 'Xl'] as $value) {
        //     ProductSize::query()->create([
        //         'name' => $value
        //     ]);
        // }

        // foreach (['#000000', '#FFFFFF', '#FF0000', '#0000FF', '#008000'] as $value) {
        //     ProductColor::query()->create([
        //         'name' => $value
        //     ]);
        // }

        for ($i = 0; $i < 1000; $i++) {
            $name = fake()->text(30);
            Product::query()->create([
                'name' => $name,
                'catalogue_id' => rand(2, 7),
                'slug' => $name . '-' . Str::random(10),
                'sku' => Str::random(7) . $i,
                'img_thumbnail' => 'https://canifa.com/img/486/733/resize/8/t/8ts24s003-sw001-xl-1-u.webp',
                'price_regular' => 600000,
                'price_sale' => 499000,
                'views' => 0
            ]);
        }

        for ($i = 1; $i < 1001; $i++) {
            ProductGallery::query()->insert(
                [
                    'product_id' => $i,
                    'image' => 'https://canifa.com/img/486/733/resize/8/t/8ts24s003-sw001-xl-1-u.webp',
                ],
                [
                    'product_id' => $i,
                    'image' => 'https://canifa.com/img/1000/1500/resize/8/t/8ts24s003-sy284-xl-1-u.webp',
                ]
            );
        }

        for ($i = 1; $i < 1001; $i++) {
            DB::table('product_tag')->insert(
                [
                    'product_id' => $i, 'tag_id' => rand(1, 8)
                ],
                [
                    'product_id' => $i, 'tag_id' => rand(9, 15)
                ]
            );
        }

        for ($productId = 1; $productId < 1001; $productId++) {
            $data = [];
            for ($productSize = 1; $productSize < 5; $productSize++) {
                for ($productColor = 1; $productColor < 6; $productColor++) {
                    $data[] = [
                        'quantity' => rand(1, 100),
                        'image' => 'https://canifa.com/img/486/733/resize/8/t/8ts24s003-sw001-xl-1-u.webp',
                        'product_id' => $productId,
                        'product_color_id' => $productColor,
                        'product_size_id' => $productSize,
                    ];
                }
            }

            DB::table('product_variants')->insert($data);
        }
    }
}
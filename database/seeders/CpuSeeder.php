<?php

namespace Database\Seeders;

use App\Models\Cpu;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Seller;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CpuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cpu::truncate();

        $json = File::get('database/product_dataset/cpu.json');
        $dataset = json_decode($json);

        foreach (array_slice($dataset, 0, 100) as $key => $value) {
            $image = 'img/components/cpu/cpu (' . fake()->numberBetween(1, 10) . ').png';
            $condition = fake()->randomElement(['brand_new', 'used']);
            if (!empty($value->price)) {
                $product = Product::create([
                    'seller_id' => Seller::find(1)->id,
                    'title' => $value->name,
                    'category' => 'cpu',
                    'price' => $value->price * 55,
                    'rating' => rand(0, 5),
                    // 'image' => [$image],
                    'condition' => $condition,
                ]);

                ProductImage::create([
                    'product_id' => $product->id,
                    'image_paths' => $image,
                ]);

                Cpu::create([
                    'product_id' => $product->id,
                    'category' => 'cpu',
                    'name' => $value->name,
                    'price' => $value->price * 55,
                    'core_count' => $value->core_count,
                    'core_clock' => $value->core_clock,
                    'boost_clock' => $value->boost_clock,
                    'tdp' => $value->tdp,
                    'graphics' => $value->graphics,
                    'smt' => $value->smt,
                    // 'image' => $image,
                    'description' => fake()->paragraph(),
                    'condition' => $condition,
                ]);
            }
        }
    }
}

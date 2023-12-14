<?php

namespace Database\Seeders;

use App\Models\CaseFan;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Seller;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CaseFanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CaseFan::truncate();

        $json = File::get('database/product_dataset/case-fan.json');
        $dataset = json_decode($json);

        foreach (array_slice($dataset, 0, 100) as $key => $value) {
            $image = 'img/components/casefan/casefan (' . fake()->numberBetween(1, 2) . ').png';
            $condition = fake()->randomElement(['brand_new', 'used']);
            if (!empty($value->price)) {
                $product = Product::create([
                    'seller_id' => Seller::find(fake()->numberBetween(2, 11))->id,
                    'title' => $value->name,
                    'category' => 'case_fan',
                    'price' => $value->price * 55,
                    'rating' => rand(0, 5),
                    // 'image' => [$image],
                    'condition' => $condition,
                    // 'weight' => rand(0.120, 0.3),
                    'weight' => fake()->randomFloat(2, 0.120, 0.3),
                ]);

                ProductImage::create([
                    'product_id' => $product->id,
                    'image_paths' => $image,
                ]);

                CaseFan::create([
                    'product_id' => $product->id,
                    'category' => 'case_fan',
                    'name' => $value->name,
                    'price' => $value->price * 55,
                    'size' => $value->size,
                    'color' => $value->color,
                    'rpm' => $value->rpm,
                    'airflow' => $value->airflow,
                    'noise_level' => $value->noise_level,
                    'pwm' => $value->pwm,
                    // 'image' => $image,
                    'description' => fake()->paragraph(),
                    'condition' => $condition,
                ]);
            }
        }
    }
}

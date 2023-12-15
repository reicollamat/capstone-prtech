<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Seller;
use App\Models\Speaker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class SpeakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Speaker::truncate();

        $json = File::get('database/product_dataset/speakers.json');
        $dataset = json_decode($json);

        foreach (array_slice($dataset, 0, 100) as $key => $value) {
            $image = 'img/components/speaker/speaker (' . fake()->numberBetween(1, 3) . ').png';
            $condition = fake()->randomElement(['brand_new', 'used']);
            if (!empty($value->price)) {
                $product = Product::create([
                    'seller_id' => Seller::find(fake()->numberBetween(1, 12))->id,
                    'title' => $value->name,
                    'category' => 'speaker',
                    'price' => $value->price * 55,
                    'rating' => rand(0, 5),
                    // 'image' => [$image],
                    'condition' => $condition,
                    'weight' => fake()->randomFloat(2, 0.8, 1),
                ]);

                ProductImage::create([
                    'product_id' => $product->id,
                    'image_paths' => $image,
                ]);

                Speaker::create([
                    'product_id' => $product->id,
                    'category' => 'speaker',
                    'name' => $value->name,
                    'price' => $value->price * 55,
                    'configuration' => $value->configuration,
                    'wattage' => $value->wattage,
                    'frequency_response' => $value->frequency_response,
                    'color' => $value->color,
                    // 'image' => $image,
                    'description' => fake()->paragraph(),
                    'condition' => $condition,
                ]);
            }
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Seller;
use App\Models\VideoCard;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class VideoCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VideoCard::truncate();

        $json = File::get('database/product_dataset/video-card.json');
        $dataset = json_decode($json);

        foreach (array_slice($dataset, 0, 100) as $key => $value) {
            $image = 'img/components/gpu/gpu (' . fake()->numberBetween(1, 10) . ').png';
            $condition = fake()->randomElement(['brand_new', 'used']);
            if (!empty($value->price)) {
                $product = Product::create([
                    'seller_id' => Seller::find(fake()->numberBetween(2, 11))->id,
                    'title' => $value->name,
                    'category' => 'video_card',
                    'price' => $value->price * 55,
                    'rating' => rand(0, 5),
                    // 'image' => [$image],
                    'condition' => $condition,
                    // 'weight' => rand(0.8, 1.2),
                    'weight' => fake()->randomFloat(2, 0.6, 1.2),

                ]);

                ProductImage::create([
                    'product_id' => $product->id,
                    'image_paths' => $image,
                ]);

                VideoCard::create([
                    'product_id' => $product->id,
                    'category' => 'video_card',
                    'name' => $value->name,
                    'price' => $value->price * 55,
                    'chipset' => $value->chipset,
                    'memory' => $value->memory,
                    'core_clock' => $value->core_clock,
                    'boost_clock' => $value->boost_clock,
                    'length' => $value->length,
                    'color' => $value->color,
                    // 'image' => $image,
                    'description' => fake()->paragraph(),
                    'condition' => $condition,
                ]);
            }
        }
    }
}

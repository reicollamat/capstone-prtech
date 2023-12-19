<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Seller;
use App\Models\Webcam;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class WebcamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Webcam::truncate();

        $json = File::get('database/product_dataset/webcam.json');
        $dataset = json_decode($json);

        foreach (array_slice($dataset, 0, 100) as $key => $value) {
            $image = 'img/components/webcam/webcam (' . fake()->numberBetween(1, 3) . ').png';
            $condition = fake()->randomElement(['brand_new', 'used']);
            if (!empty($value->price)) {
                $product = Product::create([
                    'seller_id' => Seller::find(fake()->numberBetween(1, 12))->id,
                    'title' => $value->name,
                    'category' => 'webcam',
                    'price' => $value->price * 55,
                    'rating' => rand(0, 5),
                    // 'image' => [$image],
                    'condition' => $condition,
                    // 'weight' => rand(0.3, 0.5),
                    'weight' => fake()->randomFloat(2, 0.3, 0.5),

                ]);

                ProductImage::create([
                    'product_id' => $product->id,
                    'image_paths' => $image,
                ]);

                Webcam::create([
                    'product_id' => $product->id,
                    'category' => 'webcam',
                    'name' => $value->name,
                    'price' => $value->price * 55,
                    'resolutions' => $value->resolutions,
                    'connection' => $value->connection,
                    'focus_type' => $value->focus_type,
                    'os' => $value->os,
                    'fov' => $value->fov,
                    // 'image' => $image,
                    'description' => fake()->paragraph(),
                    'condition' => $condition,
                ]);
            }
        }
    }
}

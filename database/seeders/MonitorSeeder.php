<?php

namespace Database\Seeders;

use App\Models\Monitor;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Seller;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class MonitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Monitor::truncate();

        $json = File::get('database/product_dataset/monitor.json');
        $dataset = json_decode($json);

        foreach (array_slice($dataset, 0, 100) as $key => $value) {
            $image = 'img/components/monitor/monitor (' . fake()->numberBetween(1, 3) . ').png';
            $condition = fake()->randomElement(['brand_new', 'used']);
            if (!empty($value->price)) {
                $product = Product::create([
                    'seller_id' => Seller::find(1)->id,
                    'title' => $value->name,
                    'category' => 'monitor',
                    'price' => $value->price * 55,
                    'rating' => rand(0, 5),
                    // 'image' => [$image],
                    'condition' => $condition,
                ]);

                ProductImage::create([
                    'product_id' => $product->id,
                    'image_paths' => $image,
                ]);

                Monitor::create([
                    'product_id' => $product->id,
                    'category' => 'monitor',
                    'name' => $value->name,
                    'price' => $value->price * 55,
                    'screen_size' => $value->screen_size,
                    'resolution' => $value->resolution,
                    'refresh_rate' => $value->refresh_rate,
                    'response_time' => $value->response_time,
                    'panel_type' => $value->panel_type,
                    'aspect_ratio' => $value->aspect_ratio,
                    // 'image' => $image,
                    'description' => fake()->paragraph(),
                    'condition' => $condition,
                ]);
            }
        }
    }
}

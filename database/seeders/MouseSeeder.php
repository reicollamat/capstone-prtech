<?php

namespace Database\Seeders;

use App\Models\Mouse;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Seller;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class MouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mouse::truncate();

        $json = File::get('database/product_dataset/mouse.json');
        $dataset = json_decode($json);

        foreach (array_slice($dataset, 0, 100) as $key => $value) {
            $image = 'img/components/mouse/mouse (' . fake()->numberBetween(1, 3) . ').png';
            $condition = fake()->randomElement(['brand_new', 'used']);
            if (!empty($value->price)) {
                $product = Product::create([
                    'seller_id' => Seller::find(fake()->numberBetween(1, 2))->id,
                    'title' => $value->name,
                    'category' => 'mouse',
                    'price' => $value->price * 55,
                    'rating' => rand(0, 5),
                    // 'image' => [$image],
                    'condition' => $condition,
                ]);

                ProductImage::create([
                    'product_id' => $product->id,
                    'image_paths' => $image,
                ]);

                Mouse::create([
                    'product_id' => $product->id,
                    'category' => 'mouse',
                    'name' => $value->name,
                    'price' => $value->price * 55,
                    'tracking_method' => $value->tracking_method,
                    'connection_type' => $value->connection_type,
                    'max_dpi' => $value->max_dpi,
                    'hand_orientation' => $value->hand_orientation,
                    'color' => $value->color,
                    // 'image' => $image,
                    'description' => fake()->paragraph(),
                    'condition' => $condition,
                ]);
            }
        }
    }
}

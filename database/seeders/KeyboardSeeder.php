<?php

namespace Database\Seeders;

use App\Models\Keyboard;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Seller;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class KeyboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Keyboard::truncate();

        $json = File::get('database/product_dataset/keyboard.json');
        $dataset = json_decode($json);

        foreach (array_slice($dataset, 0, 100) as $key => $value) {
            $image = 'img/components/keyboard/keyboard (' . fake()->numberBetween(1, 3) . ').png';
            $condition = fake()->randomElement(['brand_new', 'used']);
            if (!empty($value->price)) {
                $product = Product::create([
                    'seller_id' => Seller::find(fake()->numberBetween(1, 12))->id,
                    'title' => $value->name,
                    'category' => 'keyboard',
                    'price' => $value->price * 55,
                    'rating' => rand(0, 5),
                    // 'image' => [$image],
                    'condition' => $condition,
                    // 'weight' => rand(0.5, 0.8),
                    'weight' => fake()->randomFloat(2, 0.5, 0.8),

                ]);

                ProductImage::create([
                    'product_id' => $product->id,
                    'image_paths' => $image,
                ]);

                Keyboard::create([
                    'product_id' => $product->id,
                    'category' => 'keyboard',
                    'name' => $value->name,
                    'price' => $value->price * 55,
                    'style' => $value->style,
                    'switches' => $value->switches,
                    'backlit' => $value->backlit,
                    'tenkeyless' => $value->tenkeyless,
                    'connection_type' => $value->connection_type,
                    'color' => $value->color,
                    // 'image' => $image,
                    'description' => fake()->paragraph(),
                    'condition' => $condition,
                ]);
            }
        }
    }
}

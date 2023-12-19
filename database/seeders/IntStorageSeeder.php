<?php

namespace Database\Seeders;

use App\Models\IntStorage;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Seller;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class IntStorageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        IntStorage::truncate();

        $json = File::get('database/product_dataset/internal-hard-drive.json');
        $dataset = json_decode($json);

        foreach (array_slice($dataset, 0, 100) as $key => $value) {
            $image = 'img/components/intstorage/' . fake()->randomElement(['ssd-m2', 'ssd-sata']) . ' (' . fake()->numberBetween(1, 5) . ').png';
            $condition = fake()->randomElement(['brand_new', 'used']);
            if (!empty($value->price)) {
                $product = Product::create([
                    'seller_id' => Seller::find(fake()->numberBetween(1, 12))->id,
                    'title' => $value->name,
                    'category' => 'int_storage',
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

                IntStorage::create([
                    'product_id' => $product->id,
                    'category' => 'int_storage',
                    'name' => $value->name,
                    'price' => $value->price * 55,
                    'capacity' => $value->capacity,
                    'price_per_gb' => $value->price_per_gb,
                    'type' => $value->type,
                    'cache' => $value->cache,
                    'form_factor' => $value->form_factor,
                    'interface' => $value->interface,
                    // 'image' => $image,
                    'description' => fake()->paragraph(),
                    'condition' => $condition,
                ]);
            }
        }
    }
}

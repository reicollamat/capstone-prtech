<?php

namespace Database\Seeders;

use App\Models\ExtStorage;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ExtStorageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ExtStorage::truncate();

        $json = File::get('database/product_dataset/external-hard-drive.json');
        $dataset = json_decode($json);

        foreach (array_slice($dataset, 0, 100) as $key => $value) {
            $image = 'img/components/extstorage/extstorage ('.fake()->numberBetween(1, 3).').png';
            $condition = fake()->randomElement(['brand_new', 'used']);
            if (! empty($value->price)) {
                $product = Product::create([
                    'title' => $value->name,
                    'category' => 'ext_storage',
                    'price' => $value->price,
                    'rating' => rand(0, 5),
                    'image' => $image,
                    'condition' => $condition,
                ]);
                ExtStorage::create([
                    'product_id' => $product->id,
                    'category' => 'ext_storage',
                    'name' => $value->name,
                    'price' => $value->price,
                    'type' => $value->type,
                    'interface' => $value->interface,
                    'capacity' => $value->capacity,
                    'price_per_gb' => $value->price_per_gb,
                    'color' => $value->color,
                    'image' => $image,
                    'description' => fake()->paragraph(),
                    'condition' => $condition,
                ]);
            }
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\IntStorage;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        $json = File::get("database/product_dataset/internal-hard-drive.json");
        $dataset = json_decode($json);

        foreach (array_slice($dataset, 0, 100) as $key => $value) {
            $image = 'img/components/intstorage/' . fake()->randomElement(['ssd-m2', 'ssd-sata']) . ' (' . fake()->numberBetween(1, 260) . ').png';
            $condition = fake()->randomElement(['brand_new', 'used']);
            if (!empty($value->price)) {
                $product = Product::create([
                    "title" => $value->name,
                    "category" => "int_storage",
                    "price" => $value->price,
                    "image" => $image,
                    "condition" => $condition,
                ]);
                IntStorage::create([
                    "product_id" => $product->id,
                    "category" => "int_storage",
                    "name" => $value->name,
                    "price" => $value->price,
                    "capacity" => $value->capacity,
                    "price_per_gb" => $value->price_per_gb,
                    "type" => $value->type,
                    "cache" => $value->cache,
                    "form_factor" => $value->form_factor,
                    "interface" => $value->interface,
                    "image" => $image,
                    "description" => fake()->paragraph(),
                    "condition" => $condition,
                ]);
            }
        }
    }
}

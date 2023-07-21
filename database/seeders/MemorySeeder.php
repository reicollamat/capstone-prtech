<?php

namespace Database\Seeders;

use App\Models\Memory;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class MemorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Memory::truncate();

        $json = File::get("database/product_dataset/memory.json");
        $dataset = json_decode($json);

        foreach (array_slice($dataset, 0, 100) as $key => $value) {
            $image = 'img/components/ram/ram (' . fake()->numberBetween(1, 260) . ').png';
            $condition = fake()->randomElement(['brand_new', 'used']);
            if (!empty($value->price)) {
                $product = Product::create([
                    "title" => $value->name,
                    "category" => "memory",
                    "price" => $value->price,
                    "image" => $image,
                    "condition" => $condition,
                ]);
                Memory::create([
                    "product_id" => $product->id,
                    "category" => "memory",
                    "name" => $value->name,
                    "price" => $value->price,
                    "speed" => $value->speed,
                    "modules" => $value->modules,
                    "price_per_gb" => $value->price_per_gb,
                    "color" => $value->color,
                    "first_word_latency" => $value->first_word_latency,
                    "cas_latency" => $value->cas_latency,
                    "image" => $image,
                    "description" => fake()->paragraph(),
                    "condition" => $condition,
                ]);
            }
        }
    }
}

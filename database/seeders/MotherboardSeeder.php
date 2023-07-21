<?php

namespace Database\Seeders;

use App\Models\Motherboard;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class MotherboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Motherboard::truncate();

        $json = File::get("database/product_dataset/motherboard.json");
        $dataset = json_decode($json);

        foreach (array_slice($dataset, 0, 100) as $key => $value) {
            $image = 'img/components/mobo/mobo (' . fake()->numberBetween(1, 260) . ').png';
            $condition = fake()->randomElement(['brand_new', 'used']);
            if (!empty($value->price)) {
                $product = Product::create([
                    "title" => $value->name,
                    "category" => "motherboard",
                    "price" => $value->price,
                    "image" => $image,
                    "condition" => $condition,
                ]);
                Motherboard::create([
                    "product_id" => $product->id,
                    "category" => "motherboard",
                    "name" => $value->name,
                    "price" => $value->price,
                    "socket" => $value->socket,
                    "form_factor" => $value->form_factor,
                    "max_memory" => $value->max_memory,
                    "memory_slots" => $value->memory_slots,
                    "color" => $value->color,
                    "image" => $image,
                    "description" => fake()->paragraph(),
                    "condition" => $condition,
                ]);
            }
        }
    }
}

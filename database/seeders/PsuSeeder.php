<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Psu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class PsuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Psu::truncate();

        $json = File::get("database/product_dataset/power-supply.json");
        $dataset = json_decode($json);

        foreach (array_slice($dataset, 0, 100) as $key => $value) {
            $image = 'img/components/psu/psu (' . fake()->numberBetween(1, 3) . ').png';
            $condition = fake()->randomElement(['brand_new', 'used']);
            if (!empty($value->price)) {
                $product = Product::create([
                    "title" => $value->name,
                    "category" => "psu",
                    "price" => $value->price,
                    "image" => $image,
                    "condition" => $condition,
                ]);
                Psu::create([
                    "product_id" => $product->id,
                    "category" => "psu",
                    "name" => $value->name,
                    "price" => $value->price,
                    "type" => $value->type,
                    "efficiency" => $value->efficiency,
                    "wattage" => $value->wattage,
                    "modular" => $value->modular,
                    "color" => $value->color,
                    "image" => $image,
                    "description" => fake()->paragraph(),
                    "condition" => $condition,
                ]);
            }
        }
    }
}

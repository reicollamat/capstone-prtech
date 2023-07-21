<?php

namespace Database\Seeders;

use App\Models\CpuCooler;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CpuCoolerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CpuCooler::truncate();

        $json = File::get("database/product_dataset/cpu-cooler.json");
        $dataset = json_decode($json);

        foreach (array_slice($dataset, 0, 100) as $key => $value) {
            $image = 'img/components/cpucooler/cpucooler (' . fake()->numberBetween(1, 5) . ').png';
            $condition = fake()->randomElement(['brand_new', 'used']);
            if (!empty($value->price)) {
                $product = Product::create([
                    "title" => $value->name,
                    "category" => "cpu_cooler",
                    "price" => $value->price,
                    "image" => $image,
                    "condition" => $condition,
                ]);
                CpuCooler::create([
                    "product_id" => $product->id,
                    "category" => "cpu_cooler",
                    "name" => $value->name,
                    "price" => $value->price,
                    "rpm" => $value->rpm,
                    "noise_level" => $value->noise_level,
                    "color" => $value->color,
                    "size" => $value->size,
                    "image" => $image,
                    "description" => fake()->paragraph(),
                    "condition" => $condition,
                ]);
            }
        }
    }
}

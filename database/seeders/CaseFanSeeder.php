<?php

namespace Database\Seeders;

use App\Models\CaseFan;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CaseFanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CaseFan::truncate();

        $json = File::get("database/product_dataset/case-fan.json");
        $dataset = json_decode($json);

        foreach (array_slice($dataset, 0, 100) as $key => $value) {
            $image = 'img/components/casefan/casefan (' . fake()->numberBetween(1, 2) . ').png';
            $condition = fake()->randomElement(['brand_new', 'used']);
            if (!empty($value->price)) {
                $product = Product::create([
                    "title" => $value->name,
                    "category" => "case_fan",
                    "price" => $value->price,
                    "image" => $image,
                    "condition" => $condition,
                ]);
                CaseFan::create([
                    "product_id" => $product->id,
                    "category" => "case_fan",
                    "name" => $value->name,
                    "price" => $value->price,
                    "size" => $value->size,
                    "color" => $value->color,
                    "rpm" => $value->rpm,
                    "airflow" => $value->airflow,
                    "noise_level" => $value->noise_level,
                    "pwm" => $value->pwm,
                    "image" => $image,
                    "description" => fake()->paragraph(),
                    "condition" => $condition,
                ]);
            }
        }
    }
}

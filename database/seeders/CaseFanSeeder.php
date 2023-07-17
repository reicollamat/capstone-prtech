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
        $computercases = json_decode($json);
  
        foreach ($computercases as $key => $value) {
            if(!empty($value->price)){
                $product = Product::create([
                    "title" => $value->name,
                ]);
                CaseFan::create([
                    "product_id" => $product->id,
                    "name" => $value->name,
                    "price" => $value->price,
                    "size" => $value->size,
                    "color" => $value->color,
                    "rpm" => $value->rpm,
                    "airflow" => $value->airflow,
                    "noise_level" => $value->noise_level,
                    "pwm" => $value->pwm,
                    "image" => 'img/components/casefan/casefan ('.fake()->numberBetween(1, 5).').png',
                    "description" => fake()->paragraph(),
                ]);
            }
        }
    }
}

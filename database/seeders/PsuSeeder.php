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
        $computercases = json_decode($json);
  
        foreach ($computercases as $key => $value) {
            if(!empty($value->price)){
                $product = Product::create([
                    "title" => $value->name,
                ]);
                Psu::create([
                    "product_id" => $product->id,
                    "name" => $value->name,
                    "price" => $value->price,
                    "type" => $value->type,
                    "efficiency" => $value->efficiency,
                    "wattage" => $value->wattage,
                    "modular" => $value->modular,
                    "color" => $value->color,
                    "image" => 'img/components/psu/psu ('.fake()->numberBetween(1, 5).').png',
                    "description" => fake()->paragraph(),
                ]);
            }
        }
    }
}

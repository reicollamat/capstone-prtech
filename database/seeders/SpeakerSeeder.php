<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Speaker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class SpeakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Speaker::truncate();
  
        $json = File::get("database/product_dataset/speakers.json");
        $computercases = json_decode($json);
  
        foreach ($computercases as $key => $value) {
            if(!empty($value->price)){
                $product = Product::create([
                    "title" => $value->name,
                ]);
                Speaker::create([
                    "product_id" => $product->id,
                    "name" => $value->name,
                    "price" => $value->price,
                    "configuration" => $value->configuration,
                    "wattage" => $value->wattage,
                    "frequency_response" => $value->frequency_response,
                    "color" => $value->color,
                    "description" => fake()->paragraph(),
                ]);
            }
        }
    }
}

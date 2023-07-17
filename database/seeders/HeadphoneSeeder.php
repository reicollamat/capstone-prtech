<?php

namespace Database\Seeders;

use App\Models\Headphone;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class HeadphoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Headphone::truncate();
  
        $json = File::get("database/product_dataset/headphones.json");
        $computercases = json_decode($json);
  
        foreach ($computercases as $key => $value) {
            if(!empty($value->price)){
                $product = Product::create([
                    "title" => $value->name,
                ]);
                Headphone::create([
                    "product_id" => $product->id,
                    "name" => $value->name,
                    "price" => $value->price,
                    "type" => $value->type,
                    "frequency_response" => $value->frequency_response,
                    "microphone" => $value->microphone,
                    "wireless" => $value->wireless,
                    "enclosure_type" => $value->enclosure_type,
                    "color" => $value->color,
                    "description" => fake()->paragraph(),
                ]);
            }
        }
    }
}

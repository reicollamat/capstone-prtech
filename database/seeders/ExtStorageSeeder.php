<?php

namespace Database\Seeders;

use App\Models\ExtStorage;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ExtStorageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ExtStorage::truncate();
  
        $json = File::get("database/product_dataset/external-hard-drive.json");
        $computercases = json_decode($json);
  
        foreach ($computercases as $key => $value) {
            if(!empty($value->price)){
                $product = Product::create([
                    "title" => $value->name,
                ]);
                ExtStorage::create([
                    "product_id" => $product->id,
                    "name" => $value->name,
                    "price" => $value->price,
                    "type" => $value->type,
                    "interface" => $value->interface,
                    "capacity" => $value->capacity,
                    "price_per_gb" => $value->price_per_gb,
                    "color" => $value->color,
                    "description" => fake()->paragraph(),
                ]);
            }
        }
    }
}

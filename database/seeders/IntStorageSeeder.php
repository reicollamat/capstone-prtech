<?php

namespace Database\Seeders;

use App\Models\IntStorage;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class IntStorageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        IntStorage::truncate();
  
        $json = File::get("database/product_dataset/internal-hard-drive.json");
        $computercases = json_decode($json);
  
        foreach ($computercases as $key => $value) {
            if(!empty($value->price)){
                $product = Product::create([
                    "title" => $value->name,
                ]);
                IntStorage::create([
                    "product_id" => $product->id,
                    "name" => $value->name,
                    "price" => $value->price,
                    "capacity" => $value->capacity,
                    "price_per_gb" => $value->price_per_gb,
                    "type" => $value->type,
                    "cache" => $value->cache,
                    "form_factor" => $value->form_factor,
                    "interface" => $value->interface,
                    "description" => fake()->paragraph(),
                ]);
            }
        }
    }
}

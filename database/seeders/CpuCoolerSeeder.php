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
        $computercases = json_decode($json);
  
        foreach ($computercases as $key => $value) {
            if(!empty($value->price)){
                $product = Product::create([
                    "title" => $value->name,
                ]);
                CpuCooler::create([
                    "product_id" => $product->id,
                    "name" => $value->name,
                    "price" => $value->price,
                    "rpm" => $value->rpm,
                    "noise_level" => $value->noise_level,
                    "color" => $value->color,
                    "size" => $value->size,
                    "image" => 'img/components/cpucooler/cpucooler ('.fake()->numberBetween(1, 5).').png',
                    "description" => fake()->paragraph(),
                ]);
            }
        }
    }
}

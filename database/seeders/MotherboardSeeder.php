<?php

namespace Database\Seeders;

use App\Models\Motherboard;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class MotherboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Motherboard::truncate();
  
        $json = File::get("database/product_dataset/motherboard.json");
        $computercases = json_decode($json);
  
        foreach ($computercases as $key => $value) {
            if(!empty($value->price)){
                $product = Product::create([
                    "title" => $value->name,
                ]);
                Motherboard::create([
                    "product_id" => $product->id,
                    "name" => $value->name,
                    "price" => $value->price,
                    "socket" => $value->socket,
                    "form_factor" => $value->form_factor,
                    "max_memory" => $value->max_memory,
                    "memory_slots" => $value->memory_slots,
                    "color" => $value->color,
                    "description" => fake()->paragraph(),
                ]);
            }
        }
    }
}

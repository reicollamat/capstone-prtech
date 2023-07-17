<?php

namespace Database\Seeders;

use App\Models\Cpu;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CpuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cpu::truncate();
  
        $json = File::get("database/product_dataset/cpu.json");
        $computercases = json_decode($json);
  
        foreach ($computercases as $key => $value) {
            if(!empty($value->price)){
                $product = Product::create([
                    "title" => $value->name,
                ]);
                Cpu::create([
                    "product_id" => $product->id,
                    "name" => $value->name,
                    "price" => $value->price,
                    "core_count" => $value->core_count,
                    "core_clock" => $value->core_clock,
                    "boost_clock" => $value->boost_clock,
                    "tdp" => $value->tdp,
                    "graphics" => $value->graphics,
                    "smt" => $value->smt,
                    "description" => fake()->paragraph(),
                ]);
            }
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\ComputerCase;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ComputerCaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ComputerCase::truncate();
  
        $json = File::get("database/product_dataset/case.json");
        $computercases = json_decode($json);
  
        foreach ($computercases as $key => $value) {
            if(!empty($value->price)){
                $product = Product::create([
                    "title" => $value->name,
                ]);
                ComputerCase::create([
                    "product_id" => $product->id,
                    "name" => $value->name,
                    "price" => $value->price,
                    "type" => $value->type,
                    "color" => $value->color,
                    "psu" => $value->psu,
                    "sidepanel" => $value->side_panel,
                    "external_525_bays" => $value->external_525_bays,
                    "internal_35_bays" => $value->internal_35_bays,
                    "image" => 'img/components/case/case ('.fake()->numberBetween(1, 5).').png',
                    "description" => fake()->paragraph(),
                ]);
            }
        }
    }
}

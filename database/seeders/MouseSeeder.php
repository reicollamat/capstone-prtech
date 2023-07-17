<?php

namespace Database\Seeders;

use App\Models\Mouse;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class MouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mouse::truncate();
  
        $json = File::get("database/product_dataset/mouse.json");
        $computercases = json_decode($json);
  
        foreach ($computercases as $key => $value) {
            if(!empty($value->price)){
                $product = Product::create([
                    "title" => $value->name,
                ]);
                Mouse::create([
                    "product_id" => $product->id,
                    "name" => $value->name,
                    "price" => $value->price,
                    "tracking_method" => $value->tracking_method,
                    "connection_type" => $value->connection_type,
                    "max_dpi" => $value->max_dpi,
                    "hand_orientation" => $value->hand_orientation,
                    "color" => $value->color,
                    "image" => 'img/components/mouse/mouse ('.fake()->numberBetween(1, 10).').png',
                    "description" => fake()->paragraph(),
                ]);
            }
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Keyboard;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class KeyboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Keyboard::truncate();
  
        $json = File::get("database/product_dataset/keyboard.json");
        $computercases = json_decode($json);
  
        foreach ($computercases as $key => $value) {
            if(!empty($value->price)){
                $product = Product::create([
                    "title" => $value->name,
                ]);
                Keyboard::create([
                    "product_id" => $product->id,
                    "name" => $value->name,
                    "price" => $value->price,
                    "style" => $value->style,
                    "switches" => $value->switches,
                    "backlit" => $value->backlit,
                    "tenkeyless" => $value->tenkeyless,
                    "connection_type" => $value->connection_type,
                    "color" => $value->color,
                    "image" => 'img/components/keyboard/keyboard ('.fake()->numberBetween(1, 5).').png',
                    "description" => fake()->paragraph(),
                ]);
            }
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\FanController;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class FanControllerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FanController::truncate();
  
        $json = File::get("database/product_dataset/fan-controller.json");
        $computercases = json_decode($json);
  
        foreach ($computercases as $key => $value) {
            if(!empty($value->price)){
                $product = Product::create([
                    "title" => $value->name,
                ]);
                FanController::create([
                    "product_id" => $product->id,
                    "name" => $value->name,
                    "price" => $value->price,
                    "channels" => $value->channels,
                    "channel_wattage" => $value->channel_wattage,
                    "pwm" => $value->pwm,
                    "form_factor" => $value->form_factor,
                    "color" => $value->color,
                    "description" => fake()->paragraph(),
                ]);
            }
        }
    }
}

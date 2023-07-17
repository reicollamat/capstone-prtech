<?php

namespace Database\Seeders;

use App\Models\Monitor;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class MonitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Monitor::truncate();
  
        $json = File::get("database/product_dataset/monitor.json");
        $computercases = json_decode($json);
  
        foreach ($computercases as $key => $value) {
            if(!empty($value->price)){
                $product = Product::create([
                    "title" => $value->name,
                ]);
                Monitor::create([
                    "product_id" => $product->id,
                    "name" => $value->name,
                    "price" => $value->price,
                    "screen_size" => $value->screen_size,
                    "resolution" => $value->resolution,
                    "refresh_rate" => $value->refresh_rate,
                    "response_time" => $value->response_time,
                    "panel_type" => $value->panel_type,
                    "aspect_ratio" => $value->aspect_ratio,
                    "image" => 'img/components/monitor/monitor ('.fake()->numberBetween(1, 5).').png',
                    "description" => fake()->paragraph(),
                ]);
            }
        }
    }
}

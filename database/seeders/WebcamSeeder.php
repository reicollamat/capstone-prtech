<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Webcam;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class WebcamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Webcam::truncate();
  
        $json = File::get("database/product_dataset/webcam.json");
        $computercases = json_decode($json);
  
        foreach ($computercases as $key => $value) {
            if(!empty($value->price)){
                $product = Product::create([
                    "title" => $value->name,
                ]);
                Webcam::create([
                    "product_id" => $product->id,
                    "name" => $value->name,
                    "price" => $value->price,
                    "resolutions" => $value->resolutions,
                    "connection" => $value->connection,
                    "focus_type" => $value->focus_type,
                    "os" => $value->os,
                    "fov" => $value->fov,
                    "description" => fake()->paragraph(),
                ]);
            }
        }
    }
}

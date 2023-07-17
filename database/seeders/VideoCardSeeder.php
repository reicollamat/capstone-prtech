<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\VideoCard;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class VideoCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VideoCard::truncate();
  
        $json = File::get("database/product_dataset/video-card.json");
        $computercases = json_decode($json);
  
        foreach ($computercases as $key => $value) {
            if(!empty($value->price)){
                $product = Product::create([
                    "title" => $value->name,
                ]);
                VideoCard::create([
                    "product_id" => $product->id,
                    "name" => $value->name,
                    "price" => $value->price,
                    "chipset" => $value->chipset,
                    "memory" => $value->memory,
                    "core_clock" => $value->core_clock,
                    "boost_clock" => $value->boost_clock,
                    "length" => $value->length,
                    "color" => $value->color,
                    "image" => 'img/components/gpu/gpu ('.fake()->numberBetween(1, 260).').png',
                    "description" => fake()->paragraph(),
                ]);
            }
        }
    }
}

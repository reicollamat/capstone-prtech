<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\SoundCard;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class SoundCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SoundCard::truncate();
  
        $json = File::get("database/product_dataset/sound-card.json");
        $computercases = json_decode($json);
  
        foreach ($computercases as $key => $value) {
            if(!empty($value->price)){
                $product = Product::create([
                    "title" => $value->name,
                ]);
                SoundCard::create([
                    "product_id" => $product->id,
                    "name" => $value->name,
                    "price" => $value->price,
                    "channels" => $value->channels,
                    "digital_audio" => $value->digital_audio,
                    "snr" => $value->snr,
                    "sample_rate" => $value->sample_rate,
                    "chipset" => $value->chipset,
                    "interface" => $value->interface,
                    "description" => fake()->paragraph(),
                ]);
            }
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Webcam;
use App\Models\Seller;
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

        $json = File::get('database/product_dataset/webcam.json');
        $dataset = json_decode($json);

        foreach (array_slice($dataset, 0, 100) as $key => $value) {
            $image = 'img/components/webcam/webcam (' . fake()->numberBetween(1, 3) . ').png';
            $condition = fake()->randomElement(['brand_new', 'used']);
            if (!empty($value->price)) {
                $product = Product::create([
                    'seller_id' => Seller::find(1)->id,
                    'title' => $value->name,
                    'category' => 'webcam',
                    'price' => $value->price * 55,
                    'rating' => rand(0, 5),
                    'image' => $image,
                    'condition' => $condition,
                ]);
                Webcam::create([
                    'product_id' => $product->id,
                    'category' => 'webcam',
                    'name' => $value->name,
                    'price' => $value->price * 55,
                    'resolutions' => $value->resolutions,
                    'connection' => $value->connection,
                    'focus_type' => $value->focus_type,
                    'os' => $value->os,
                    'fov' => $value->fov,
                    'image' => $image,
                    'description' => fake()->paragraph(),
                    'condition' => $condition,
                ]);
            }
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Headphone;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class HeadphoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Headphone::truncate();

        $json = File::get('database/product_dataset/headphones.json');
        $dataset = json_decode($json);

        foreach (array_slice($dataset, 0, 100) as $key => $value) {
            $image = 'img/components/headphone/headphone (' . fake()->numberBetween(1, 3) . ').png';
            $condition = fake()->randomElement(['brand_new', 'used']);
            if (!empty($value->price)) {
                $product = Product::create([
                    'seller_id' => Seller::find(1)->id,
                    'title' => $value->name,
                    'category' => 'headphone',
                    'price' => $value->price * 55,
                    'rating' => rand(0, 5),
                    'image' => [$image],
                    'condition' => $condition,
                ]);
                Headphone::create([
                    'product_id' => $product->id,
                    'category' => 'headphone',
                    'name' => $value->name,
                    'price' => $value->price * 55,
                    'type' => $value->type,
                    'frequency_response' => $value->frequency_response,
                    'microphone' => $value->microphone,
                    'wireless' => $value->wireless,
                    'enclosure_type' => $value->enclosure_type,
                    'color' => $value->color,
                    'image' => $image,
                    'description' => fake()->paragraph(),
                    'condition' => $condition,
                ]);
            }
        }
    }
}

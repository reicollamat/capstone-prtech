<?php

namespace Database\Seeders;

use App\Models\ComputerCase;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Seller;
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

        $json = File::get('database/product_dataset/case.json');
        $dataset = json_decode($json);

        foreach (array_slice($dataset, 0, 100) as $key => $value) {
            $image = 'img/components/case/case (' . fake()->numberBetween(1, 3) . ').png';
            $condition = fake()->randomElement(['brand_new', 'used']);
            if (!empty($value->price)) {
                $product = Product::create([
                    'seller_id' => Seller::find(fake()->numberBetween(2, 11))->id,
                    'title' => $value->name,
                    'category' => 'computer_case',
                    'price' => $value->price * 55,
                    'rating' => rand(0, 5),
                    // 'image' => [$image],
                    'condition' => $condition,
                    // 'weight' => rand(2.5, 5),
                    'weight' => fake()->randomFloat(2, 2.5, 5),
                ]);

                ProductImage::create([
                    'product_id' => $product->id,
                    'image_paths' => $image,
                ]);

                ComputerCase::create([
                    'product_id' => $product->id,
                    'category' => 'computer_case',
                    'name' => $value->name,
                    'price' => $value->price * 55,
                    'type' => $value->type,
                    'color' => $value->color,
                    'psu' => $value->psu,
                    'sidepanel' => $value->side_panel,
                    'external_525_bays' => $value->external_525_bays,
                    'internal_35_bays' => $value->internal_35_bays,
                    // 'image' => $image,
                    'description' => fake()->paragraph(),
                    'condition' => $condition,
                ]);
            }
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductStockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();

        foreach ($products as $key => $product) {

            $stock = fake()->numberBetween(0, 50);

            if ($stock == 0) {
                $status = 'not available';
            } else {
                $status = 'available';
            }

            $product->update([
                'stock' => $stock,
                'status' => $status,
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Comment;
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

            if ($comments = Comment::where('product_id', $product->id)) {
                $product->update([
                    'purchase_count' => $comments->count(),
                    'view_count' => $comments->count(),
                ]);
            }

            $product->update([
                'stock' => $stock,
                'status' => $status,
            ]);
        }
    }
}

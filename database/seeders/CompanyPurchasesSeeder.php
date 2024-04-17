<?php

namespace Database\Seeders;

use App\Helpers\ReferenceGeneratorHelper;
use App\Helpers\ShippingHelper;
use App\Models\Comment;
use App\Models\ExtStorage;
use App\Models\Headphone;
use App\Models\Keyboard;
use App\Models\Memory;
use App\Models\Mouse;
use App\Models\Payment;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\Seller;
use App\Models\SellerShopMetrics;
use App\Models\Shipments;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CompanyPurchasesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // TECHLABS
        $user = User::find(2);
        $seller = Seller::where('user_id', $user->id)->first();

        $products = Product::where('seller_id', $seller->id)->get()->take(5);

        $company_products = [
            [
                'product' => $products[0],
                'csv_path' => 'app/kimpc_products/data222_new-old.csv',
            ],
            [
                'product' => $products[1],
                'csv_path' => 'app/kimpc_products/data187_new-old.csv',
            ],
            [
                'product' => $products[2],
                'csv_path' => 'app/kimpc_products/data708_new-old.csv',
            ],
            [
                'product' => $products[3],
                'csv_path' => 'app/kimpc_products/data55_new-old.csv',
            ],
            [
                'product' => $products[4],
                'csv_path' => 'app/kimpc_products/data249_new-old.csv',
            ],
        ];

        // loop for each kimpc products csv to seed PURCHASE TRANSACTIONS based from the data csv files
        foreach ($company_products as $key => $prod) {
            $filePath = storage_path($prod['csv_path']);
            $file = fopen($filePath, 'r');

            $header = fgetcsv($file);

            $data_new_csv = [];
            while ($row = fgetcsv($file)) {
                $data_new_csv[] = array_combine($header, $row);
            }

            fclose($file);

            $quantity_sum = 0;
            $positive_sum = 0;
            $negative_sum = 0;

            // loop each date
            foreach ($data_new_csv as $key => $row) {
                // loop quantity to create purchase transations each
                for ($i = 0; $i < $row['quantity']; $i++) {
                    $buyer = User::find(fake()->numberBetween(3, 23));
                    $shipping_value = ShippingHelper::computeShipping($prod['product']->weight);
                    $total = $prod['product']->price + $shipping_value;
                    $created_date = Carbon::parse($row['created_date'])->toDateTimeString();

                    //generate reference number for purchase
                    $puchase_reference_number = ReferenceGeneratorHelper::generateReferenceString();

                    $purchase = new Purchase([
                        'user_id' => $buyer->id,
                        'seller_id' => $seller->id,
                        'reference_number' => $puchase_reference_number,
                        'purchase_date' => $created_date,
                        'total_amount' => $total,
                        'shipping_fee' => $shipping_value,
                        'purchase_status' => 'completed',
                        'created_at' => $created_date,
                        'updated_at' => $created_date,
                    ]);
                    $purchase->save();

                    $payment = new Payment([
                        'user_id' => $buyer->id,
                        'purchase_id' => $purchase->id,
                        'date_of_payment' => $created_date,
                        'payment_type' => 'cod',
                        'payment_status' => 'paid',
                        'reference_code' => '#samplecode',
                        'created_at' => $created_date,
                        'updated_at' => $created_date,
                    ]);
                    $payment->save();

                    $purchase_item = new PurchaseItem([
                        'purchase_id' => $purchase->id,
                        'product_id' => $prod['product']->id,
                        'quantity' => 1,
                        'total_price' => $prod['product']->price,
                        'comment_id' => null,
                        'created_at' => $created_date,
                        'updated_at' => $created_date,
                    ]);
                    $purchase_item->save();

                    $shipment = new Shipments([
                        'shipment_number' => random_int(0000000000, 9999999999),
                        'purchase_id' => $purchase->id,
                        'user_id' => $buyer->id,
                        'seller_id' => $seller->id,
                        'email' => $user->email,
                        'phone_number' => $user->phone_number,
                        'shipment_status' => 'completed',
                        'street_address_1' => $user->street_address_1,
                        'state_province' => $user->state_province,
                        'city' => $user->city,
                        'postal_code' => $user->postal_code,
                        'country' => $user->country,
                        'created_at' => $created_date,
                        'updated_at' => $created_date,
                    ]);
                    $shipment->save();

                    // create comments for positive and negative
                    // positive comments
                    if ($i < $row['positive']) {
                        $get_positive_comment = Comment::where('sentiment', 1)->skip(fake()->numberBetween(1, 25410))->first();

                        $positive_comment = new Comment([
                            'user_id' => $buyer->id,
                            'product_id' => $prod['product']->id,
                            'seller_id' => $prod['product']->seller_id,
                            'text' => $get_positive_comment->text,
                            'rating' => $get_positive_comment->rating,
                            'sentiment' => 1,
                            'created_at' => $created_date,
                            'updated_at' => $created_date,
                        ]);
                        $positive_comment->save();

                        $purchase_item->update([
                            'comment_id' => $positive_comment->id,
                        ]);
                    }
                    // negative comments
                    if ($i >= $row['positive'] && ($i - $row['positive']) < $row['negative']) {
                        $get_negative_comment = Comment::where('sentiment', 0)->skip(fake()->numberBetween(1, 580))->first();

                        $negative_comment = new Comment([
                            'user_id' => $buyer->id,
                            'product_id' => $prod['product']->id,
                            'seller_id' => $prod['product']->seller_id,
                            'text' => $get_negative_comment->text,
                            'rating' => $get_negative_comment->rating,
                            'sentiment' => 0,
                            'created_at' => $created_date,
                            'updated_at' => $created_date,
                        ]);
                        $negative_comment->save();

                        $purchase_item->update([
                            'comment_id' => $negative_comment->id,
                        ]);
                    }
                }

                $quantity_sum += $row['quantity'];
                $positive_sum += $row['positive'];
                $negative_sum += $row['negative'];
            }

            $prod['product']->update([
                'purchase_count' => $quantity_sum,
                'view_count' => $quantity_sum,
            ]);
        }


        // JDC WORLD
        $user = User::find(3);
        $seller = Seller::where('user_id', $user->id)->first();

        $products = Product::where('seller_id', $seller->id)->get()->take(5);

        $company_products = [
            [
                'product' => $products[0],
                'csv_path' => 'app/kimpc_products/data222_new-old.csv',
            ],
            [
                'product' => $products[1],
                'csv_path' => 'app/kimpc_products/data187_new-old.csv',
            ],
            [
                'product' => $products[2],
                'csv_path' => 'app/kimpc_products/data708_new-old.csv',
            ],
            [
                'product' => $products[3],
                'csv_path' => 'app/kimpc_products/data55_new-old.csv',
            ],
            [
                'product' => $products[4],
                'csv_path' => 'app/kimpc_products/data249_new-old.csv',
            ],
        ];

        // loop for each kimpc products csv to seed PURCHASE TRANSACTIONS based from the data csv files
        foreach ($company_products as $key => $prod) {
            $filePath = storage_path($prod['csv_path']);
            $file = fopen($filePath, 'r');

            $header = fgetcsv($file);

            $data_new_csv = [];
            while ($row = fgetcsv($file)) {
                $data_new_csv[] = array_combine($header, $row);
            }

            fclose($file);

            $quantity_sum = 0;
            $positive_sum = 0;
            $negative_sum = 0;

            // loop each date
            foreach ($data_new_csv as $key => $row) {
                // loop quantity to create purchase transations each
                for ($i = 0; $i < $row['quantity']; $i++) {
                    $buyer = User::find(fake()->numberBetween(3, 23));
                    $shipping_value = ShippingHelper::computeShipping($prod['product']->weight);
                    $total = $prod['product']->price + $shipping_value;
                    $created_date = Carbon::parse($row['created_date'])->toDateTimeString();

                    //generate reference number for purchase
                    $puchase_reference_number = ReferenceGeneratorHelper::generateReferenceString();

                    $purchase = new Purchase([
                        'user_id' => $buyer->id,
                        'seller_id' => $seller->id,
                        'reference_number' => $puchase_reference_number,
                        'purchase_date' => $created_date,
                        'total_amount' => $total,
                        'shipping_fee' => $shipping_value,
                        'purchase_status' => 'completed',
                        'created_at' => $created_date,
                        'updated_at' => $created_date,
                    ]);
                    $purchase->save();

                    $payment = new Payment([
                        'user_id' => $buyer->id,
                        'purchase_id' => $purchase->id,
                        'date_of_payment' => $created_date,
                        'payment_type' => 'cod',
                        'payment_status' => 'paid',
                        'reference_code' => '#samplecode',
                        'created_at' => $created_date,
                        'updated_at' => $created_date,
                    ]);
                    $payment->save();

                    $purchase_item = new PurchaseItem([
                        'purchase_id' => $purchase->id,
                        'product_id' => $prod['product']->id,
                        'quantity' => 1,
                        'total_price' => $prod['product']->price,
                        'comment_id' => null,
                        'created_at' => $created_date,
                        'updated_at' => $created_date,
                    ]);
                    $purchase_item->save();

                    $shipment = new Shipments([
                        'shipment_number' => random_int(0000000000, 9999999999),
                        'purchase_id' => $purchase->id,
                        'user_id' => $buyer->id,
                        'seller_id' => $seller->id,
                        'email' => $user->email,
                        'phone_number' => $user->phone_number,
                        'shipment_status' => 'completed',
                        'street_address_1' => $user->street_address_1,
                        'state_province' => $user->state_province,
                        'city' => $user->city,
                        'postal_code' => $user->postal_code,
                        'country' => $user->country,
                        'created_at' => $created_date,
                        'updated_at' => $created_date,
                    ]);
                    $shipment->save();

                    // create comments for positive and negative
                    // positive comments
                    if ($i < $row['positive']) {
                        $get_positive_comment = Comment::where('sentiment', 1)->skip(fake()->numberBetween(1, 25410))->first();

                        $positive_comment = new Comment([
                            'user_id' => $buyer->id,
                            'product_id' => $prod['product']->id,
                            'seller_id' => $prod['product']->seller_id,
                            'text' => $get_positive_comment->text,
                            'rating' => $get_positive_comment->rating,
                            'sentiment' => 1,
                            'created_at' => $created_date,
                            'updated_at' => $created_date,
                        ]);
                        $positive_comment->save();

                        $purchase_item->update([
                            'comment_id' => $positive_comment->id,
                        ]);
                    }
                    // negative comments
                    if ($i >= $row['positive'] && ($i - $row['positive']) < $row['negative']) {
                        $get_negative_comment = Comment::where('sentiment', 0)->skip(fake()->numberBetween(1, 580))->first();

                        $negative_comment = new Comment([
                            'user_id' => $buyer->id,
                            'product_id' => $prod['product']->id,
                            'seller_id' => $prod['product']->seller_id,
                            'text' => $get_negative_comment->text,
                            'rating' => $get_negative_comment->rating,
                            'sentiment' => 0,
                            'created_at' => $created_date,
                            'updated_at' => $created_date,
                        ]);
                        $negative_comment->save();

                        $purchase_item->update([
                            'comment_id' => $negative_comment->id,
                        ]);
                    }
                }

                $quantity_sum += $row['quantity'];
                $positive_sum += $row['positive'];
                $negative_sum += $row['negative'];
            }

            $prod['product']->update([
                'purchase_count' => $quantity_sum,
                'view_count' => $quantity_sum,
            ]);
        }
    }
}

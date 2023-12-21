<?php

namespace Database\Seeders;

use App\Helpers\ReferenceGeneratorHelper;
use App\Helpers\ShippingHelper;
use App\Models\Comment;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\Shipments;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sql = File::get('database/seeders/sql/purchases_db.sql');
        DB::unprepared($sql);
        // $sql = File::get('database/seeders/sql/payments_db.sql');
        // DB::unprepared($sql);
        // $sql = File::get('database/seeders/sql/purchase_items_db.sql');
        // DB::unprepared($sql);
        // $sql = File::get('database/seeders/sql/shipments_db.sql');
        // DB::unprepared($sql);






        // $comments =  Comment::whereBetween('id', [1, 8000])->get();

        // foreach ($comments as $key => $comment) {
        //     $user = User::find($comment->user_id);
        //     $product = Product::find($comment->product_id);
        //     $shipping_value = ShippingHelper::computeShipping($product->weight);
        //     $total = $product->price + $shipping_value;

        //     //generate reference number for purchase
        //     $puchase_reference_number = ReferenceGeneratorHelper::generateReferenceString();

        //     $purchase = new Purchase([
        //         'user_id' => $comment->user_id,
        //         'seller_id' => $comment->seller_id,
        //         'reference_number' => $puchase_reference_number,
        //         'purchase_date' => now(),
        //         'total_amount' => $total,
        //         'shipping_fee' => $shipping_value,
        //         'purchase_status' => 'completed',
        //     ]);
        //     $purchase->save();


        //     $payment = new Payment([
        //         'user_id' => $comment->user_id,
        //         'purchase_id' => $purchase->id,
        //         'date_of_payment' => null,
        //         'payment_type' => 'cod',
        //         'payment_status' => 'paid',
        //         'reference_code' => '#samplecode',
        //     ]);
        //     $payment->save();

        //     $purchaseItem = new PurchaseItem([
        //         'purchase_id' => $purchase->id,
        //         'product_id' => $comment->product_id,
        //         'quantity' => 1,
        //         'total_price' => $product->price,
        //         'comment_id' => $comment->id,
        //     ]);
        //     $purchaseItem->save();

        //     $shipment = new Shipments([
        //         'shipment_number' => random_int(0000000000, 9999999999),
        //         'purchase_id' => $purchase->id,
        //         'user_id' => $comment->user_id,
        //         'seller_id' => $comment->seller_id,
        //         'email' => $user->email,
        //         'phone_number' => $user->phone_number,
        //         'shipment_status' => 'completed',
        //         'street_address_1' => $user->street_address_1,
        //         'state_province' => $user->state_province,
        //         'city' => $user->city,
        //         'postal_code' => $user->postal_code,
        //         'country' => $user->country,
        //     ]);
        //     $shipment->save();
        // }

        // $comments =  Comment::whereBetween('id', [8001, 16000])->get();

        // foreach ($comments as $key => $comment) {
        //     $user = User::find($comment->user_id);
        //     $product = Product::find($comment->product_id);
        //     $shipping_value = ShippingHelper::computeShipping($product->weight);
        //     $total = $product->price + $shipping_value;

        //     //generate reference number for purchase
        //     $puchase_reference_number = ReferenceGeneratorHelper::generateReferenceString();

        //     $purchase = new Purchase([
        //         'user_id' => $comment->user_id,
        //         'seller_id' => $comment->seller_id,
        //         'reference_number' => $puchase_reference_number,
        //         'purchase_date' => now(),
        //         'total_amount' => $total,
        //         'shipping_fee' => $shipping_value,
        //         'purchase_status' => 'completed',
        //     ]);
        //     $purchase->save();


        //     $payment = new Payment([
        //         'user_id' => $comment->user_id,
        //         'purchase_id' => $purchase->id,
        //         'date_of_payment' => null,
        //         'payment_type' => 'cod',
        //         'payment_status' => 'paid',
        //         'reference_code' => '#samplecode',
        //     ]);
        //     $payment->save();

        //     $purchaseItem = new PurchaseItem([
        //         'purchase_id' => $purchase->id,
        //         'product_id' => $comment->product_id,
        //         'quantity' => 1,
        //         'total_price' => $product->price,
        //         'comment_id' => $comment->id,
        //     ]);
        //     $purchaseItem->save();

        //     $shipment = new Shipments([
        //         'shipment_number' => random_int(0000000000, 9999999999),
        //         'purchase_id' => $purchase->id,
        //         'user_id' => $comment->user_id,
        //         'seller_id' => $comment->seller_id,
        //         'email' => $user->email,
        //         'phone_number' => $user->phone_number,
        //         'shipment_status' => 'completed',
        //         'street_address_1' => $user->street_address_1,
        //         'state_province' => $user->state_province,
        //         'city' => $user->city,
        //         'postal_code' => $user->postal_code,
        //         'country' => $user->country,
        //     ]);
        //     $shipment->save();
        // }

        // $comments =  Comment::whereBetween('id', [16001, 24000])->get();

        // foreach ($comments as $key => $comment) {
        //     $user = User::find($comment->user_id);
        //     $product = Product::find($comment->product_id);
        //     $shipping_value = ShippingHelper::computeShipping($product->weight);
        //     $total = $product->price + $shipping_value;

        //     //generate reference number for purchase
        //     $puchase_reference_number = ReferenceGeneratorHelper::generateReferenceString();

        //     $purchase = new Purchase([
        //         'user_id' => $comment->user_id,
        //         'seller_id' => $comment->seller_id,
        //         'reference_number' => $puchase_reference_number,
        //         'purchase_date' => now(),
        //         'total_amount' => $total,
        //         'shipping_fee' => $shipping_value,
        //         'purchase_status' => 'completed',
        //     ]);
        //     $purchase->save();


        //     $payment = new Payment([
        //         'user_id' => $comment->user_id,
        //         'purchase_id' => $purchase->id,
        //         'date_of_payment' => null,
        //         'payment_type' => 'cod',
        //         'payment_status' => 'paid',
        //         'reference_code' => '#samplecode',
        //     ]);
        //     $payment->save();

        //     $purchaseItem = new PurchaseItem([
        //         'purchase_id' => $purchase->id,
        //         'product_id' => $comment->product_id,
        //         'quantity' => 1,
        //         'total_price' => $product->price,
        //         'comment_id' => $comment->id,
        //     ]);
        //     $purchaseItem->save();

        //     $shipment = new Shipments([
        //         'shipment_number' => random_int(0000000000, 9999999999),
        //         'purchase_id' => $purchase->id,
        //         'user_id' => $comment->user_id,
        //         'seller_id' => $comment->seller_id,
        //         'email' => $user->email,
        //         'phone_number' => $user->phone_number,
        //         'shipment_status' => 'completed',
        //         'street_address_1' => $user->street_address_1,
        //         'state_province' => $user->state_province,
        //         'city' => $user->city,
        //         'postal_code' => $user->postal_code,
        //         'country' => $user->country,
        //     ]);
        //     $shipment->save();
        // }

        // $comments =  Comment::whereBetween('id', [24001, 32000])->get();

        // foreach ($comments as $key => $comment) {
        //     $user = User::find($comment->user_id);
        //     $product = Product::find($comment->product_id);
        //     $shipping_value = ShippingHelper::computeShipping($product->weight);
        //     $total = $product->price + $shipping_value;

        //     //generate reference number for purchase
        //     $puchase_reference_number = ReferenceGeneratorHelper::generateReferenceString();

        //     $purchase = new Purchase([
        //         'user_id' => $comment->user_id,
        //         'seller_id' => $comment->seller_id,
        //         'reference_number' => $puchase_reference_number,
        //         'purchase_date' => now(),
        //         'total_amount' => $total,
        //         'shipping_fee' => $shipping_value,
        //         'purchase_status' => 'completed',
        //     ]);
        //     $purchase->save();


        //     $payment = new Payment([
        //         'user_id' => $comment->user_id,
        //         'purchase_id' => $purchase->id,
        //         'date_of_payment' => null,
        //         'payment_type' => 'cod',
        //         'payment_status' => 'paid',
        //         'reference_code' => '#samplecode',
        //     ]);
        //     $payment->save();

        //     $purchaseItem = new PurchaseItem([
        //         'purchase_id' => $purchase->id,
        //         'product_id' => $comment->product_id,
        //         'quantity' => 1,
        //         'total_price' => $product->price,
        //         'comment_id' => $comment->id,
        //     ]);
        //     $purchaseItem->save();

        //     $shipment = new Shipments([
        //         'shipment_number' => random_int(0000000000, 9999999999),
        //         'purchase_id' => $purchase->id,
        //         'user_id' => $comment->user_id,
        //         'seller_id' => $comment->seller_id,
        //         'email' => $user->email,
        //         'phone_number' => $user->phone_number,
        //         'shipment_status' => 'completed',
        //         'street_address_1' => $user->street_address_1,
        //         'state_province' => $user->state_province,
        //         'city' => $user->city,
        //         'postal_code' => $user->postal_code,
        //         'country' => $user->country,
        //     ]);
        //     $shipment->save();
        // }

        // $comments =  Comment::whereBetween('id', [32001, 40000])->get();

        // foreach ($comments as $key => $comment) {
        //     $user = User::find($comment->user_id);
        //     $product = Product::find($comment->product_id);
        //     $shipping_value = ShippingHelper::computeShipping($product->weight);
        //     $total = $product->price + $shipping_value;

        //     //generate reference number for purchase
        //     $puchase_reference_number = ReferenceGeneratorHelper::generateReferenceString();

        //     $purchase = new Purchase([
        //         'user_id' => $comment->user_id,
        //         'seller_id' => $comment->seller_id,
        //         'reference_number' => $puchase_reference_number,
        //         'purchase_date' => now(),
        //         'total_amount' => $total,
        //         'shipping_fee' => $shipping_value,
        //         'purchase_status' => 'completed',
        //     ]);
        //     $purchase->save();


        //     $payment = new Payment([
        //         'user_id' => $comment->user_id,
        //         'purchase_id' => $purchase->id,
        //         'date_of_payment' => null,
        //         'payment_type' => 'cod',
        //         'payment_status' => 'paid',
        //         'reference_code' => '#samplecode',
        //     ]);
        //     $payment->save();

        //     $purchaseItem = new PurchaseItem([
        //         'purchase_id' => $purchase->id,
        //         'product_id' => $comment->product_id,
        //         'quantity' => 1,
        //         'total_price' => $product->price,
        //         'comment_id' => $comment->id,
        //     ]);
        //     $purchaseItem->save();

        //     $shipment = new Shipments([
        //         'shipment_number' => random_int(0000000000, 9999999999),
        //         'purchase_id' => $purchase->id,
        //         'user_id' => $comment->user_id,
        //         'seller_id' => $comment->seller_id,
        //         'email' => $user->email,
        //         'phone_number' => $user->phone_number,
        //         'shipment_status' => 'completed',
        //         'street_address_1' => $user->street_address_1,
        //         'state_province' => $user->state_province,
        //         'city' => $user->city,
        //         'postal_code' => $user->postal_code,
        //         'country' => $user->country,
        //     ]);
        //     $shipment->save();
        // }

        // $comments =  Comment::whereBetween('id', [40001, 48000])->get();

        // foreach ($comments as $key => $comment) {
        //     $user = User::find($comment->user_id);
        //     $product = Product::find($comment->product_id);
        //     $shipping_value = ShippingHelper::computeShipping($product->weight);
        //     $total = $product->price + $shipping_value;

        //     //generate reference number for purchase
        //     $puchase_reference_number = ReferenceGeneratorHelper::generateReferenceString();

        //     $purchase = new Purchase([
        //         'user_id' => $comment->user_id,
        //         'seller_id' => $comment->seller_id,
        //         'reference_number' => $puchase_reference_number,
        //         'purchase_date' => now(),
        //         'total_amount' => $total,
        //         'shipping_fee' => $shipping_value,
        //         'purchase_status' => 'completed',
        //     ]);
        //     $purchase->save();


        //     $payment = new Payment([
        //         'user_id' => $comment->user_id,
        //         'purchase_id' => $purchase->id,
        //         'date_of_payment' => null,
        //         'payment_type' => 'cod',
        //         'payment_status' => 'paid',
        //         'reference_code' => '#samplecode',
        //     ]);
        //     $payment->save();

        //     $purchaseItem = new PurchaseItem([
        //         'purchase_id' => $purchase->id,
        //         'product_id' => $comment->product_id,
        //         'quantity' => 1,
        //         'total_price' => $product->price,
        //         'comment_id' => $comment->id,
        //     ]);
        //     $purchaseItem->save();

        //     $shipment = new Shipments([
        //         'shipment_number' => random_int(0000000000, 9999999999),
        //         'purchase_id' => $purchase->id,
        //         'user_id' => $comment->user_id,
        //         'seller_id' => $comment->seller_id,
        //         'email' => $user->email,
        //         'phone_number' => $user->phone_number,
        //         'shipment_status' => 'completed',
        //         'street_address_1' => $user->street_address_1,
        //         'state_province' => $user->state_province,
        //         'city' => $user->city,
        //         'postal_code' => $user->postal_code,
        //         'country' => $user->country,
        //     ]);
        //     $shipment->save();
        // }

        // $comments =  Comment::whereBetween('id', [48001, 54065])->get();

        // foreach ($comments as $key => $comment) {
        //     $user = User::find($comment->user_id);
        //     $product = Product::find($comment->product_id);
        //     $shipping_value = ShippingHelper::computeShipping($product->weight);
        //     $total = $product->price + $shipping_value;

        //     //generate reference number for purchase
        //     $puchase_reference_number = ReferenceGeneratorHelper::generateReferenceString();

        //     $purchase = new Purchase([
        //         'user_id' => $comment->user_id,
        //         'seller_id' => $comment->seller_id,
        //         'reference_number' => $puchase_reference_number,
        //         'purchase_date' => now(),
        //         'total_amount' => $total,
        //         'shipping_fee' => $shipping_value,
        //         'purchase_status' => 'completed',
        //     ]);
        //     $purchase->save();


        //     $payment = new Payment([
        //         'user_id' => $comment->user_id,
        //         'purchase_id' => $purchase->id,
        //         'date_of_payment' => null,
        //         'payment_type' => 'cod',
        //         'payment_status' => 'paid',
        //         'reference_code' => '#samplecode',
        //     ]);
        //     $payment->save();

        //     $purchaseItem = new PurchaseItem([
        //         'purchase_id' => $purchase->id,
        //         'product_id' => $comment->product_id,
        //         'quantity' => 1,
        //         'total_price' => $product->price,
        //         'comment_id' => $comment->id,
        //     ]);
        //     $purchaseItem->save();

        //     $shipment = new Shipments([
        //         'shipment_number' => random_int(0000000000, 9999999999),
        //         'purchase_id' => $purchase->id,
        //         'user_id' => $comment->user_id,
        //         'seller_id' => $comment->seller_id,
        //         'email' => $user->email,
        //         'phone_number' => $user->phone_number,
        //         'shipment_status' => 'completed',
        //         'street_address_1' => $user->street_address_1,
        //         'state_province' => $user->state_province,
        //         'city' => $user->city,
        //         'postal_code' => $user->postal_code,
        //         'country' => $user->country,
        //     ]);
        //     $shipment->save();
        // }
    }
}

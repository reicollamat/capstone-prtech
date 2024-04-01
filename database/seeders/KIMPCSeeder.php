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

class KIMPCSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // seed an KIMPC user
        $user = User::factory()->create([
            'name' => 'kim_pc',
            'first_name' => 'Kim',
            'last_name' => 'Megs',
            'email' => 'raycollamat11@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('kimpc123'),
            'phone_number' => '09604471340',
            'street_address_1' => 'E. Dela Paz Street, San Roque',
            'city' => 'Marikina',
            'postal_code' => 1801,
            'country' => 'Philippines',
            'is_seller' => true,
        ]);

        // for KIMPC seller account
        $seller = Seller::factory()->create([
            'user_id' => $user->id,
            'registered_business_name' => $user->first_name.' '.$user->last_name,
            'shop_name' => 'KIMPC',
            'shop_email' => $user->email,
            'shop_phone_number' => $user->phone_number,
            'shop_address' => $user->street_address_1,
            'shop_city' => $user->city,
            'shop_state_province' => $user->state_province,
            'shop_postal_code' => $user->postal_code,
            'registered_address' => $user->street_address_1,
            'registered_city' => $user->city,
            'registered_state_province' => $user->state_province,
            'registered_postal_code' => $user->postal_code,
        ]);

        SellerShopMetrics::create([
            'total_earnings' => 0.00,
            'target_sales' => 10000,
            'seller_id' => $seller->id,
        ]);

        // PRODUCTS
        // 1 //
        $image1 = 'img/components/extstorage/kimpc_extstorage.png';
        $product1 = Product::create([
            'seller_id' => $seller->id,
            'title' => 'Kioxia Transmemory U202 32GB',
            'category' => 'ext_storage',
            'price' => '180',
            'rating' => rand(0, 5),
            'condition' => 'brand_new',
            'weight' => fake()->randomFloat(2, 0.3, 0.6),
            'status' => 'available',
            'stock' => fake()->numberBetween(10, 30),
            'reserve' => fake()->numberBetween(1, 7),
            'purchase_count' => 0,
            'view_count' => 0,
        ]);

        ProductImage::create([
            'product_id' => $product1->id,
            'image_paths' => $image1,
        ]);

        ExtStorage::create([
            'product_id' => $product1->id,
            'category' => 'ext_storage',
            'name' => $product1->title,
            'price' => $product1->price,
            'type' => 'Optical Drive',
            'interface' => 'USB 2.0',
            'capacity' => '32000',
            'price_per_gb' => '0.029',
            'color' => 'White',
            'description' => 'Thanks to the simple enclosure of the TransMemory U202 USB flash drives, you can take this storage everywhere every day. Despite its small design, the TransMemory U202 USB flash drives offer plenty of space up to 32GB of storage for photos, music, videos, documents and more.',
            'condition' => $product1->condition,
        ]);

        // 2 //
        $image2 = 'img/components/mouse/kimpc_mouse.png';
        $product2 = Product::create([
            'seller_id' => $seller->id,
            'title' => 'Rakk Alti Illuminated Gaming Mouse',
            'category' => 'mouse',
            'price' => '375',
            'rating' => rand(0, 5),
            'condition' => 'brand_new',
            'weight' => fake()->randomFloat(2, 0.3, 0.6),
            'status' => 'available',
            'stock' => fake()->numberBetween(10, 30),
            'reserve' => fake()->numberBetween(1, 7),
            'purchase_count' => 0,
            'view_count' => 0,
        ]);

        ProductImage::create([
            'product_id' => $product2->id,
            'image_paths' => $image2,
        ]);

        Mouse::create([
            'product_id' => $product2->id,
            'category' => 'mouse',
            'name' => $product2->title,
            'price' => $product2->price,
            'tracking_method' => 'Optical',
            'connection_type' => 'Wired',
            'max_dpi' => 25600,
            'hand_orientation' => 'Right',
            'color' => 'Black',
            'description' => 'The Rakk Alti Illuminated Gaming Mouse offers superior precision and style. With customizable RGB lighting, ergonomic design, and responsive buttons, it enhances gaming experience. Dominate the game with this high-performance mouse, combining functionality and aesthetic appeal.',
            'condition' => $product2->condition,
        ]);

        // 3 //
        $image3 = 'img/components/headphone/kimpc_headphone.png';
        $product3 = Product::create([
            'seller_id' => $seller->id,
            'title' => 'Edifier W800BT Plus Wireless Stereo Headphones',
            'category' => 'headphone',
            'price' => '1900',
            'rating' => rand(0, 5),
            'condition' => 'brand_new',
            'weight' => fake()->randomFloat(2, 0.3, 0.6),
            'status' => 'available',
            'stock' => fake()->numberBetween(10, 30),
            'reserve' => fake()->numberBetween(1, 7),
            'purchase_count' => 0,
            'view_count' => 0,
        ]);

        ProductImage::create([
            'product_id' => $product3->id,
            'image_paths' => $image3,
        ]);
        Headphone::create([
            'product_id' => $product3->id,
            'category' => 'headphone',
            'name' => $product3->title,
            'price' => $product3->price,
            'type' => 'Circumaural',
            'frequency_response' => '[20, 20]',
            'microphone' => 1,
            'wireless' => 1,
            'color' => 'Black',
            'description' => 'The W800BT plus is a set of impressive wireless Bluetooth headphones. The light weight frame is extremely comfortable allowing you to enjoy a full day of listening.  The over the head design has an ergonomic fit made from a breathable high elastic material and faux leather cover. The closed back design also helps with reducing outside noise and keeping your sound in.',
            'condition' => $product3->condition,
        ]);

        // 4 //
        $image4 = 'img/components/keyboard/kimpc_keyboard.png';
        $product4 = Product::create([
            'seller_id' => 13,
            'title' => 'RAKK DIWA Mecahnical Gaming Keyboard',
            'category' => 'keyboard',
            'price' => '1400',
            'rating' => rand(0, 5),
            'condition' => 'brand_new',
            'weight' => fake()->randomFloat(2, 0.3, 0.6),
            'status' => 'available',
            'stock' => fake()->numberBetween(10, 30),
            'reserve' => fake()->numberBetween(1, 7),
            'purchase_count' => 0,
            'view_count' => 0,
        ]);

        ProductImage::create([
            'product_id' => $product4->id,
            'image_paths' => $image4,
        ]);

        Keyboard::create([
            'product_id' => $product4->id,
            'category' => 'keyboard',
            'name' => $product4->title,
            'price' => $product4->price,
            'style' => 'Gaming',
            'switches' => 'Huano Blue',
            'backlit' => 'RGB',
            'tenkeyless' => '1',
            'connection_type' => 'Wired',
            'color' => 'Black/Blue',
            'description' => 'Unleash precision and speed with the RAKK DIWA Mechanical Gaming Keyboard. Featuring Outemu Red Hotswap switches, 68 keys for a compact layout, and hot-swappable capability, it delivers a responsive gaming experience. Elevate your gameplay with this compact and customizable mechanical keyboard.',
            'condition' => $product4->condition,
        ]);

        // 5 //
        $image5 = 'img/components/ram/kimpc_ram.png';
        $product5 = Product::create([
            'seller_id' => 13,
            'title' => 'XLR8 Gaming EPIC-X RGB',
            'category' => 'memory',
            'price' => '1735',
            'rating' => rand(0, 5),
            'condition' => 'brand_new',
            'weight' => fake()->randomFloat(2, 0.3, 0.6),
            'status' => 'available',
            'stock' => fake()->numberBetween(10, 30),
            'reserve' => fake()->numberBetween(1, 7),
            'purchase_count' => 0,
            'view_count' => 0,
        ]);

        ProductImage::create([
            'product_id' => $product5->id,
            'image_paths' => $image5,
        ]);

        Memory::create([
            'product_id' => $product5->id,
            'category' => 'memory',
            'name' => $product5->title,
            'price' => $product5->price,
            'speed' => '[4, 3600]',
            'modules' => '[2, 8]',
            'price_per_gb' => '1.530',
            'color' => 'Black',
            'first_word_latency' => '10',
            'cas_latency' => '16',
            'description' => 'XLR8 Gaming EPIC-X RGB Memory is designed for gamers and enthusiasts and offers a brilliant RGB design combined with extreme overclocked performance, taking your PC to the extreme. Not only you destroy the competition on the outside, also have good looks on the inside. PNY has your back with its elite DDR4 RGB Silver 3200MHz CL16 desktop memory upgrade. Our most advanced RGB with aluminum heat spreaders of brushed silver and simplistic design.',
            'condition' => $product5->condition,
        ]);

        $kimpc_products = [
            [
                'product' => $product1,
                'csv_path' => 'app/kimpc_products/data222_new.csv',
            ],
            [
                'product' => $product2,
                'csv_path' => 'app/kimpc_products/data187_new.csv',
            ],
            [
                'product' => $product3,
                'csv_path' => 'app/kimpc_products/data708_new.csv',
            ],
            [
                'product' => $product4,
                'csv_path' => 'app/kimpc_products/data55_new.csv',
            ],
            [
                'product' => $product5,
                'csv_path' => 'app/kimpc_products/data249_new.csv',
            ],
        ];

        // loop for each kimpc products csv to seed PURCHASE TRANSACTIONS based from the data csv files
        foreach ($kimpc_products as $key => $prod) {
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

        // // 2 //
        // $image = 'img/components/mouse/kimpc_mouse.png';
        // $product = Product::create([
        //     'seller_id' => $seller->id,
        //     'title' => 'Rakk Alti Illuminated Gaming Mouse',
        //     'category' => 'mouse',
        //     'price' => '375',
        //     'rating' => rand(0, 5),
        //     // 'image' => [$image],
        //     'condition' => 'brand_new',
        //     // 'weight' => rand(0.3, 0.6),
        //     'weight' => fake()->randomFloat(2, 0.3, 0.6),
        //     'status' => 'available',
        //     'stock' => fake()->numberBetween(10, 30),
        //     'reserve' => fake()->numberBetween(1, 7),
        //     'purchase_count' => 0,
        //     'view_count' => 0,
        // ]);

        // ProductImage::create([
        //     'product_id' => $product->id,
        //     'image_paths' => $image,
        // ]);

        // Mouse::create([
        //     'product_id' => $product->id,
        //     'category' => 'mouse',
        //     'name' => $product->title,
        //     'price' => $product->price,
        //     'tracking_method' => 'Optical',
        //     'connection_type' => 'Wired',
        //     'max_dpi' => 25600,
        //     'hand_orientation' => 'Right',
        //     'color' => 'Black',
        //     // 'image' => $image,
        //     'description' => 'The Rakk Alti Illuminated Gaming Mouse offers superior precision and style. With customizable RGB lighting, ergonomic design, and responsive buttons, it enhances gaming experience. Dominate the game with this high-performance mouse, combining functionality and aesthetic appeal.

        //         ',
        //     'condition' => $product->condition,
        // ]);

        // $filePath = storage_path('app/kimpc_products/data187_new.csv');
        // $file = fopen($filePath, 'r');

        // $header = fgetcsv($file);

        // $data187_new = [];
        // while ($row = fgetcsv($file)) {
        //     $data187_new[] = array_combine($header, $row);
        // }

        // fclose($file);

        // $quantity_sum = 0;
        // $positive_sum = 0;
        // $negative_sum = 0;

        // // loop each date
        // foreach ($data187_new as $key => $row) {
        //     // loop quantity to create purchase transations each
        //     for ($i = 0; $i < $row["quantity"]; $i++) {
        //         $buyer = User::find(fake()->numberBetween(3, 23));
        //         $shipping_value = ShippingHelper::computeShipping($product->weight);
        //         $total = $product->price + $shipping_value;
        //         $created_date = Carbon::parse($row["created_date"])->toDateTimeString();

        //         //generate reference number for purchase
        //         $puchase_reference_number = ReferenceGeneratorHelper::generateReferenceString();

        //         $purchase = new Purchase([
        //             'user_id' => $buyer->id,
        //             'seller_id' => $seller->id,
        //             'reference_number' => $puchase_reference_number,
        //             'purchase_date' => $created_date,
        //             'total_amount' => $total,
        //             'shipping_fee' => $shipping_value,
        //             'purchase_status' => 'completed',
        //         ]);
        //         $purchase->save();

        //         $payment = new Payment([
        //             'user_id' => $buyer->id,
        //             'purchase_id' => $purchase->id,
        //             'date_of_payment' => $created_date,
        //             'payment_type' => 'cod',
        //             'payment_status' => 'paid',
        //             'reference_code' => '#samplecode',
        //         ]);
        //         $payment->save();

        //         $purchase_item = new PurchaseItem([
        //             'purchase_id' => $purchase->id,
        //             'product_id' => $product->id,
        //             'quantity' => 1,
        //             'total_price' => $product->price,
        //             'comment_id' => null,
        //         ]);
        //         $purchase_item->save();

        //         $shipment = new Shipments([
        //             'shipment_number' => random_int(0000000000, 9999999999),
        //             'purchase_id' => $purchase->id,
        //             'user_id' => $buyer->id,
        //             'seller_id' => $seller->id,
        //             'email' => $user->email,
        //             'phone_number' => $user->phone_number,
        //             'shipment_status' => 'completed',
        //             'street_address_1' => $user->street_address_1,
        //             'state_province' => $user->state_province,
        //             'city' => $user->city,
        //             'postal_code' => $user->postal_code,
        //             'country' => $user->country,
        //         ]);
        //         $shipment->save();

        //         // create comments for positive and negative
        //         if ($i < $row["positive"]) {
        //             $get_positive_comment = Comment::where('sentiment', 1)->skip(fake()->numberBetween(1, 25410))->first();

        //             $positive_comment = new Comment([
        //                 'user_id' => $buyer->id,
        //                 'product_id' => $product->id,
        //                 'seller_id' => $product->seller_id,
        //                 'text' => $get_positive_comment->text,
        //                 'rating' => $get_positive_comment->rating,
        //                 'sentiment' => 1,
        //                 'created_at' => $created_date,
        //                 'updated_at' => $created_date,
        //             ]);
        //             $positive_comment->save();
        //         }
        //         if ($i < $row["negative"]) {
        //             $get_negative_comment = Comment::where('sentiment', 0)->skip(fake()->numberBetween(1, 580))->first();

        //             $negative_comment = new Comment([
        //                 'user_id' => $buyer->id,
        //                 'product_id' => $product->id,
        //                 'seller_id' => $product->seller_id,
        //                 'text' => $get_negative_comment->text,
        //                 'rating' => $get_negative_comment->rating,
        //                 'sentiment' => 1,
        //                 'created_at' => $created_date,
        //                 'updated_at' => $created_date,
        //             ]);
        //             $negative_comment->save();
        //         }
        //     }

        //     $quantity_sum += $row['quantity'];
        //     $positive_sum += $row['positive'];
        //     $negative_sum += $row['negative'];
        // }

        // $product->update([
        //     'purchase_count' => $quantity_sum,
        //     'view_count' => $quantity_sum,
        // ]);

        // // 3 //
        // $image = 'img/components/headphone/kimpc_headphone.png';
        // $product = Product::create([
        //     'seller_id' => $seller->id,
        //     'title' => 'Edifier W800BT Plus Wireless Stereo Headphones',
        //     'category' => 'headphone',
        //     'price' => '1900',
        //     'rating' => rand(0, 5),
        //     // 'image' => [$image],
        //     'condition' => 'brand_new',
        //     // 'weight' => rand(0.3, 0.6),
        //     'weight' => fake()->randomFloat(2, 0.3, 0.6),
        //     'status' => 'available',
        //     'stock' => fake()->numberBetween(10, 30),
        //     'reserve' => fake()->numberBetween(1, 7),
        //     'purchase_count' => 0,
        //     'view_count' => 0,
        // ]);

        // ProductImage::create([
        //     'product_id' => $product->id,
        //     'image_paths' => $image,
        // ]);
        // Headphone::create([
        //     'product_id' => $product->id,
        //     'category' => 'headphone',
        //     'name' => $product->title,
        //     'price' => $product->price,
        //     'type' => 'Circumaural',
        //     'frequency_response' => '[20, 20]',
        //     'microphone' => 1,
        //     'wireless' => 1,
        //     // 'enclosure_type' => $value->enclosure_type,
        //     'color' => 'Bleack',
        //     // 'image' => $image,
        //     'description' => 'The W800BT plus is a set of impressive wireless Bluetooth headphones. The light weight frame is extremely comfortable allowing you to enjoy a full day of listening.  The over the head design has an ergonomic fit made from a breathable high elastic material and faux leather cover. The closed back design also helps with reducing outside noise and keeping your sound in.
        //         ',
        //     'condition' => $product->condition,
        // ]);

        // $filePath = storage_path('app/kimpc_products/data708_new.csv');
        // $file = fopen($filePath, 'r');

        // $header = fgetcsv($file);

        // $data708_new = [];
        // while ($row = fgetcsv($file)) {
        //     $data708_new[] = array_combine($header, $row);
        // }

        // fclose($file);

        // $quantity_sum = 0;
        // $positive_sum = 0;
        // $negative_sum = 0;
        // foreach ($data708_new as $key => $row) {
        //     // loop quantity to create purchase transations each
        //     for ($i = 0; $i < $row["quantity"]; $i++) {
        //         $buyer = User::find(fake()->numberBetween(3, 23));
        //         $shipping_value = ShippingHelper::computeShipping($product->weight);
        //         $total = $product->price + $shipping_value;
        //         $created_date = Carbon::parse($row["created_date"])->toDateTimeString();

        //         //generate reference number for purchase
        //         $puchase_reference_number = ReferenceGeneratorHelper::generateReferenceString();

        //         $purchase = new Purchase([
        //             'user_id' => $buyer->id,
        //             'seller_id' => $seller->id,
        //             'reference_number' => $puchase_reference_number,
        //             'purchase_date' => $created_date,
        //             'total_amount' => $total,
        //             'shipping_fee' => $shipping_value,
        //             'purchase_status' => 'completed',
        //         ]);
        //         $purchase->save();

        //         $payment = new Payment([
        //             'user_id' => $buyer->id,
        //             'purchase_id' => $purchase->id,
        //             'date_of_payment' => $created_date,
        //             'payment_type' => 'cod',
        //             'payment_status' => 'paid',
        //             'reference_code' => '#samplecode',
        //         ]);
        //         $payment->save();

        //         $purchase_item = new PurchaseItem([
        //             'purchase_id' => $purchase->id,
        //             'product_id' => $product->id,
        //             'quantity' => 1,
        //             'total_price' => $product->price,
        //             'comment_id' => null,
        //         ]);
        //         $purchase_item->save();

        //         $shipment = new Shipments([
        //             'shipment_number' => random_int(0000000000, 9999999999),
        //             'purchase_id' => $purchase->id,
        //             'user_id' => $buyer->id,
        //             'seller_id' => $seller->id,
        //             'email' => $user->email,
        //             'phone_number' => $user->phone_number,
        //             'shipment_status' => 'completed',
        //             'street_address_1' => $user->street_address_1,
        //             'state_province' => $user->state_province,
        //             'city' => $user->city,
        //             'postal_code' => $user->postal_code,
        //             'country' => $user->country,
        //         ]);
        //         $shipment->save();

        //         // create comments for positive and negative
        //         if ($i < $row["positive"]) {
        //             $get_positive_comment = Comment::where('sentiment', 1)->skip(fake()->numberBetween(1, 25410))->first();

        //             $positive_comment = new Comment([
        //                 'user_id' => $buyer->id,
        //                 'product_id' => $product->id,
        //                 'seller_id' => $product->seller_id,
        //                 'text' => $get_positive_comment->text,
        //                 'rating' => $get_positive_comment->rating,
        //                 'sentiment' => 1,
        //                 'created_at' => $created_date,
        //                 'updated_at' => $created_date,
        //             ]);
        //             $positive_comment->save();
        //         }
        //         if ($i < $row["negative"]) {
        //             $get_negative_comment = Comment::where('sentiment', 0)->skip(fake()->numberBetween(1, 580))->first();

        //             $negative_comment = new Comment([
        //                 'user_id' => $buyer->id,
        //                 'product_id' => $product->id,
        //                 'seller_id' => $product->seller_id,
        //                 'text' => $get_negative_comment->text,
        //                 'rating' => $get_negative_comment->rating,
        //                 'sentiment' => 1,
        //                 'created_at' => $created_date,
        //                 'updated_at' => $created_date,
        //             ]);
        //             $negative_comment->save();
        //         }
        //     }

        //     $quantity_sum += $row['quantity'];
        //     $positive_sum += $row['positive'];
        //     $negative_sum += $row['negative'];
        // }

        // $product->update([
        //     'purchase_count' => $quantity_sum,
        //     'view_count' => $quantity_sum,
        // ]);

        //     // 4 //
        //     $image = 'img/components/keyboard/kimpc_keyboard.png';
        //     $product = Product::create([
        //         'seller_id' => 13,
        //         'title' => 'RAKK DIWA Mecahnical Gaming Keyboard',
        //         'category' => 'keyboard',
        //         'price' => '1400',
        //         'rating' => rand(0, 5),
        //         // 'image' => [$image],
        //         'condition' => 'brand_new',
        //         // 'weight' => rand(0.3, 0.6),
        //         'weight' => fake()->randomFloat(2, 0.3, 0.6),
        //         'status' => 'available',
        //         'stock' => fake()->numberBetween(10, 30),
        //         'reserve' => fake()->numberBetween(1, 7),
        //         'purchase_count' => 0,
        //         'view_count' => 0,
        //     ]);

        //     ProductImage::create([
        //         'product_id' => $product->id,
        //         'image_paths' => $image,
        //     ]);

        //     Keyboard::create([
        //         'product_id' => $product->id,
        //         'category' => 'keyboard',
        //         'name' => $product->title,
        //         'price' => $product->price,
        //         'style' => 'Gaming',
        //         'switches' => 'Huano Blue',
        //         'backlit' => 'RGB',
        //         'tenkeyless' => '1',
        //         'connection_type' => 'Wired',
        //         'color' => 'Black/Blue',
        //         // 'image' => $image,
        //         'description' => 'Unleash precision and speed with the RAKK DIWA Mechanical Gaming Keyboard. Featuring Outemu Red Hotswap switches, 68 keys for a compact layout, and hot-swappable capability, it delivers a responsive gaming experience. Elevate your gameplay with this compact and customizable mechanical keyboard.',
        //         'condition' => $product->condition,
        //     ]);

        //     $filePath = storage_path('app/kimpc_products/data55_new.csv');
        //     $file = fopen($filePath, 'r');

        //     $header = fgetcsv($file);

        //     $data55_new = [];
        //     while ($row = fgetcsv($file)) {
        //         $data55_new[] = array_combine($header, $row);
        //     }

        //     fclose($file);

        //     // $data55 = compact('data55_new');

        //     // dd($data55_new);

        //     $quantity_sum = 0;
        //     $positive_sum = 0;
        //     $negative_sum = 0;
        //     foreach ($data55_new as $key => $row) {
        //         $quantity_sum += $row['quantity'];
        //         $positive_sum += $row['positive'];
        //         $negative_sum += $row['negative'];
        //     }

        //     $product->update([
        //         'purchase_count' => $quantity_sum,
        //         'view_count' => $quantity_sum,
        //     ]);

        //     // 5 //
        //     $image = 'img/components/ram/kimpc_ram.png';
        //     $product = Product::create([
        //         'seller_id' => 13,
        //         'title' => 'XLR8 Gaming EPIC-X RGB',
        //         'category' => 'memory',
        //         'price' => '1735',
        //         'rating' => rand(0, 5),
        //         // 'image' => [$image],
        //         'condition' => 'brand_new',
        //         // 'weight' => rand(0.3, 0.6),
        //         'weight' => fake()->randomFloat(2, 0.3, 0.6),
        //         'status' => 'available',
        //         'stock' => fake()->numberBetween(10, 30),
        //         'reserve' => fake()->numberBetween(1, 7),
        //         'purchase_count' => 0,
        //         'view_count' => 0,
        //     ]);

        //     ProductImage::create([
        //         'product_id' => $product->id,
        //         'image_paths' => $image,
        //     ]);

        //     Memory::create([
        //         'product_id' => $product->id,
        //         'category' => 'memory',
        //         'name' => $product->title,
        //         'price' => $product->price,
        //         'speed' => '[4, 3600]',
        //         'modules' => '[2, 8]',
        //         'price_per_gb' => '1.530',
        //         'color' => 'Black',
        //         'first_word_latency' => '10',
        //         'cas_latency' => '16',
        //         // 'image' => $image,
        //         'description' => 'XLR8 Gaming EPIC-X RGB Memory is designed for gamers and enthusiasts and offers a brilliant RGB design combined with extreme overclocked performance, taking your PC to the extreme. Not only you destroy the competition on the outside, also have good looks on the inside. PNY has your back with its elite DDR4 RGB Silver 3200MHz CL16 desktop memory upgrade. Our most advanced RGB with aluminum heat spreaders of brushed silver and simplistic design.',
        //         'condition' => $product->condition,
        //     ]);

        //     $filePath = storage_path('app/kimpc_products/data55_new.csv');
        //     $file = fopen($filePath, 'r');

        //     $header = fgetcsv($file);

        //     $data55_new = [];
        //     while ($row = fgetcsv($file)) {
        //         $data55_new[] = array_combine($header, $row);
        //     }

        //     fclose($file);

        //     // $data55 = compact('data55_new');

        //     // dd($data55_new);

        //     $quantity_sum = 0;
        //     $positive_sum = 0;
        //     $negative_sum = 0;
        //     foreach ($data55_new as $key => $row) {
        //         $quantity_sum += $row['quantity'];
        //         $positive_sum += $row['positive'];
        //         $negative_sum += $row['negative'];
        //     }

        //     $product->update([
        //         'purchase_count' => $quantity_sum,
        //         'view_count' => $quantity_sum,
        //     ]);

    }
}

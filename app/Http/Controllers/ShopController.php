<?php

namespace App\Http\Controllers;

use App\Models\CaseFan;
use App\Models\ComputerCase;
use App\Models\Cpu;
use App\Models\CpuCooler;
use App\Models\ExtStorage;
use App\Models\Headphone;
use App\Models\IntStorage;
use App\Models\Keyboard;
use App\Models\Memory;
use App\Models\Monitor;
use App\Models\Motherboard;
use App\Models\Mouse;
use App\Models\Product;
use App\Models\Psu;
use App\Models\Speaker;
use App\Models\VideoCard;
use App\Models\Webcam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $all_products = Product::all();
        // $case_fan = CaseFan::all();
        // $computer_case = ComputerCase::all();
        // $cpu = Cpu::all();
        // $cpu_cooler = CpuCooler::all();
        // $ext_storage = ExtStorage::all();
        // $headphone = Headphone::all();
        // $int_storage = IntStorage::all();
        // $keyboard = Keyboard::all();
        // $memory = Memory::all();
        // $monitor = Monitor::all();
        // $motherboard = Motherboard::all();
        // $mouse = Mouse::all();
        // $psu = Psu::all();
        // $speaker = Speaker::all();
        // $video_card = VideoCard::all();
        // $webcam = Webcam::all();

        // get checked categories
        if ($request->sort) {
            if (! empty(array_diff(array_keys($request->query()), ['sort', 'direction']))) {
                // get products with check categories
                $products = Product::sortable();

                $category_checked = array_keys($request->query());
                $products = $products->whereIn('category', $category_checked)->paginate(30);
            }

            $products = Product::sortable()->paginate();
        } else {
            // get products with check categories
            $products = Product::sortable();

            $category_checked = array_keys($request->query());
            $products = $products->whereIn('category', $category_checked)->paginate(30);
        }

        Session::forget('to_search');

        // get all products if all categories not checked
        if (empty($request->query())) {
            $products = Product::sortable()->paginate(30);

            return view('pages.shop', [
                'products' => $products,
                'all_products' => $all_products,
            ]);
        } else {
            if ($request->to_search) {
                $to_search = $request->to_search;
                $products = Product::where('title', 'ilike', '%'.$to_search.'%')->sortable()->paginate(30);
                Session::put('to_search', $to_search);

                return view('pages.shop', [
                    'products' => $products,
                    'all_products' => $all_products,
                ])->with('to_search', $to_search);
            } else {
                return view('pages.shop', [
                    'products' => $products,
                    'all_products' => $all_products,
                ]);
            }
            // $products = Product::sortable()->paginate(30);
        }
    }

    public function product_detail($product_id, $category)
    {
        // Define a map of categories to their respective models
        $categoryMap = [
            'computer_case' => ComputerCase::class,
            'case_fan' => CaseFan::class,
            'cpu' => Cpu::class,
            'cpu_cooler' => CpuCooler::class,
            'ext_storage' => ExtStorage::class,
            'int_storage' => IntStorage::class,
            'headphone' => Headphone::class,
            'keyboard' => Keyboard::class,
            'memory' => Memory::class,
            'monitor' => Monitor::class,
            'motherboard' => Motherboard::class,
            'mouse' => Mouse::class,
            'psu' => Psu::class,
            'speaker' => Speaker::class,
            'video_card' => VideoCard::class,
            'webcam' => Webcam::class,
        ];

        // Check if the category exists in the category map
        if (array_key_exists($category, $categoryMap)) {
            // Get the corresponding model class for the category
            $modelClass = $categoryMap[$category];

            // Resolve the model using the model class and product_id
            $product = app()->make($modelClass)->where('product_id', $product_id)->get()->first();
        } else {
            // Handle the case when the category doesn't exist
            abort(404);
        }

        // generate 10 random models corresponds to category
        $count = 10;

        $randomcategoryMap = [
            'computer_case' => ComputerCase::inRandomOrder()->take($count)->get(),
            'case_fan' => CaseFan::inRandomOrder()->take($count)->get(),
            'cpu' => Cpu::inRandomOrder()->take($count)->get(),
            'cpu_cooler' => CpuCooler::inRandomOrder()->take($count)->get(),
            'ext_storage' => ExtStorage::inRandomOrder()->take($count)->get(),
            'int_storage' => IntStorage::inRandomOrder()->take($count)->get(),
            'headphone' => Headphone::inRandomOrder()->take($count)->get(),
            'keyboard' => Keyboard::inRandomOrder()->take($count)->get(),
            'memory' => Memory::inRandomOrder()->take($count)->get(),
            'monitor' => Monitor::inRandomOrder()->take($count)->get(),
            'motherboard' => Motherboard::inRandomOrder()->take($count)->get(),
            'mouse' => Mouse::inRandomOrder()->take($count)->get(),
            'psu' => Psu::inRandomOrder()->take($count)->get(),
            'speaker' => Speaker::inRandomOrder()->take($count)->get(),
            'video_card' => VideoCard::inRandomOrder()->take($count)->get(),
            'webcam' => Webcam::inRandomOrder()->take($count)->get(),
        ];

        if (array_key_exists($category, $randomcategoryMap)) {
            // Get the corresponding model class for the category
            $random_models = $randomcategoryMap[$category];
        } else {
            // Handle the case when the category doesn't exist
            abort(404);
        }

        return view('pages.productdetail', [
            'product' => $product,
            'category' => $category,
            'random_models' => $random_models,
        ]);
    }

    public function search_result(Request $request)
    {
        if (! empty($request->to_search)) {
            $to_search = $request->to_search;
        }
        // dd($to_search);

        return redirect(route('index_shop', [
            'to_search' => $to_search,
        ]));
    }
}

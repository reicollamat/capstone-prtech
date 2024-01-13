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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LandingController extends Controller
{
    public function index()
    {
        Session::forget('to_search');
        $products = Product::all();
        $case_fan = CaseFan::all();
        $computer_case = ComputerCase::all();
        $cpu = Cpu::all();
        $cpu_cooler = CpuCooler::all();
        $ext_storage = ExtStorage::all();
        $headphone = Headphone::all();
        $int_storage = IntStorage::all();
        $keyboard = Keyboard::all();
        $memory = Memory::all();
        $monitor = Monitor::all();
        $motherboard = Motherboard::all();
        $mouse = Mouse::all();
        $psu = Psu::all();
        $speaker = Speaker::all();
        $video_card = VideoCard::all();
        $webcam = Webcam::all();

        // get 8 random products for featured products
        $random_products = $products->random(8);
        $featured_products = [];
        foreach ($random_products as $key => $value) {
            $featured_products[] = Product::find($value->id)->category($value->category)->first();
        }

        // get 8 most recent products
        $recents = $products->sortDesc()->take(8);
        $recent_products = [];
        foreach ($recents as $key => $value) {
            $recent_products[] = Product::find($value->id)->category($value->category)->first();
        }

        if (Auth::user()) {

            $user = Auth::user();
            // dd($user);

            // check if user has missing infos
            if ($user->first_name == null || $user->last_name == null || $user->phone_number == null || $user->street_address_1 == null || $user->state_province == null || $user->city == null || $user->postal_code == null || $user->country == null) {
                return redirect()->route('buyer-on-boarding');
            }
        }

        return view('pages.home', [
            'featured_products' => $featured_products,
            'recent_products' => $recent_products,
            'products' => $products,
            'case_fan' => $case_fan,
            'computer_case' => $computer_case,
            'cpu' => $cpu,
            'cpu_cooler' => $cpu_cooler,
            'ext_storage' => $ext_storage,
            'headphone' => $headphone,
            'int_storage' => $int_storage,
            'keyboard' => $keyboard,
            'memory' => $memory,
            'monitor' => $monitor,
            'motherboard' => $motherboard,
            'mouse' => $mouse,
            'psu' => $psu,
            'speaker' => $speaker,
            'video_card' => $video_card,
            'webcam' => $webcam,
        ]);
    }

    // redirect to admin panel if the account has permission
    public function redirect()
    {
        $permissions = Auth::user()->permissions ?? '';

        // dd($permissions);

        /**
         * Convert the "permissions" value to an array if it is currently a string.
         * When using Buyer registration the permission column is a array while in Seller registration it is a string.
         * this is fix for both cases, do not mind this
         * @param string|array $permissions The value of the "permissions" variable.
         * @return array The updated value of the "permissions" variable.
         */
        if (gettype($permissions) == 'string') {
            $permissions = json_decode($permissions, true);
        }


        // check permissions column
        if ($permissions['platform.index'] == 0) {
            return redirect('/');
        } else {
            return redirect('/admin');
        }
    }
}

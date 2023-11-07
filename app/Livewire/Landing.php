<?php

namespace App\Livewire;

use App\Models\AnnouncementBanner;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\On;
use Livewire\Component;

class Landing extends Component
{
    public int $count = 0;

    public function mount()

    {
        //        $all_products = Http::get('http://127.0.0.1:8000/api/product') ?? null;
        //        $all_products = Http::timeout(3)->get('http://127.0.0.1:8000/api/product') ?? null;


        //        $this->announcements = AnnouncementBanner::all();

    }

    public function placeholder()
    {
        return <<<'HTML'
        <div>
            <p1>loading</p1>
        </div>
        HTML;
    }

    public function render()
    {

        //        $response = Http::timeout(3)->get('https://jsonplaceholder.typicode.com/todos/1');
        //        $collection = json_decode($response);


        return view('livewire.landing');
    }

    // login-register test
    //    public function login()
    //    {
    //        return view('layouts.login-register-layout');
    //    }

    //    public function register()
    //    {
    //        return view('layouts.login-register-layout');
    //    }

    #[On('wishlist-item-remount')]
    public function increment()
    {
        $this->count++;
    }
}

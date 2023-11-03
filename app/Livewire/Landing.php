<?php

namespace App\Livewire;

use App\Models\AnnouncementBanner;
use Livewire\Attributes\On;
use Livewire\Component;

class Landing extends Component
{
    public int $count = 0;

    public function mount()
    {
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
        return view('livewire.landing');
    }

    // login-register test
    public function login()
    {
        return view('layouts.login-register-layout');
    }

    public function register()
    {
        return view('layouts.login-register-layout');
    }

    #[On('wishlist-item-remount')]
    public function increment()
    {
        $this->count++;
    }
}

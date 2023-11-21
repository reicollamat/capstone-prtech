<?php

namespace App\Livewire;

use App\Models\AnnouncementBanner;
use Livewire\Component;

class Announcementbar extends Component
{
    public $announcements = [];

    public function mount()
    {
        $this->announcements = AnnouncementBanner::all();
    }

    public function render()
    {
        return view('livewire.announcementbar');
    }
}

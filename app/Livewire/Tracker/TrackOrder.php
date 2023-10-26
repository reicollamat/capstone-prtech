<?php

namespace App\Livewire\Tracker;

use Livewire\Component;

class TrackOrder extends Component
{
    public function placeholder()
    {
        return <<<'HTML'
            <div class="w-full h-full d-flex justify-center items-center x-transition" x-transition.duration.500ms>
                <div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        HTML;
    }

    public function mount()
    {

    }

    public function render()
    {
        return view('livewire..tracker.track-order');
    }

    public function track()
    {
        sleep(10);
    }
}

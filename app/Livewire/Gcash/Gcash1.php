<?php

namespace App\Livewire\Gcash;

use Livewire\Component;

class Gcash1 extends Component
{
    public function render()
    {
        return view('livewire.gcash.gcash1');
    }

    public function gcash2()
    {
        $this->redirect(route('gcash2'), navigate: true);
    }
}

<?php

namespace App\Livewire\Gcash;

use Livewire\Component;

class Gcash2 extends Component
{
    public function render()
    {
        return view('livewire.gcash.gcash2');
    }
    public function gcash3()
    {
        $this->redirect(route('gcash3'), navigate: true);
    }
}

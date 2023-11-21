<?php

namespace App\Livewire\Modals;

use LivewireUI\Modal\ModalComponent;

class SampleModal extends ModalComponent
{
    public function render()
    {
        return view('livewire.modals.sample-modal');
    }
}

<?php

namespace App\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\Attributes\Url;

class LeaveReview extends Component
{


    public function review_page(Request $request)
    {
        // dd($request->purchase_id);
        return view('livewire.leave-review', [
            'purchase_id' => $request->purchase_id,
        ]);
    }

    public function render()
    {
        return view('livewire.leave-review');
    }
}

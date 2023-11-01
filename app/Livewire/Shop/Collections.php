<?php

namespace App\Livewire\Shop;

use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Lazy;
use Livewire\Component;
use Livewire\WithPagination;

#[Lazy]
class Collections extends Component
{
    use WithPagination;

    public $all_products = [];

    public function mount()
    {
        $this->all_products = DB::table('products')->limit(10)->get();
    }

    public function render()
    {
        return view('livewire..shop.collections');
    }
}

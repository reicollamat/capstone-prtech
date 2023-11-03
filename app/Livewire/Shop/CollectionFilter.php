<?php

namespace App\Livewire\Shop;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Url;
use Livewire\Component;

class CollectionFilter extends Component
{
    public $all_products;

    #[Url(as: 'filter', history: true, keep: false)]
    public $category_filter = [];

    #[Url(as: 'condition', history: true, keep: true)]
    public $conditon_filter = [];


    public function mount()
    {

        $this->all_products = DB::table('products')->get();
    }

    public function render()
    {
        return view('livewire..shop.collection-filter');
    }


}

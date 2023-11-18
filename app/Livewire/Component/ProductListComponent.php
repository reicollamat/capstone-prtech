<?php

namespace App\Livewire\Component;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ProductListComponent extends Component
{
    public $item;

    public function mount($item)
    {
        //        dd($item);
        //        $this->item = Product::join($item->category, $item->id, '=', $item->category . '.product.id');

        //        dd(Product::join($item->category, $item->id, '=', $item->category . '.product.id'));
        //        $test = DB::table($item->category)->join('products', $item->category . '.product_id', '=', 'products.id');
        $test = DB::table('products')->join('');


        //        dd($item->category . '.product_id');
        dd($test);
    }

    public function render()
    {
        return view('livewire.component.product-list-component');
    }
}

<?php

namespace App\Livewire\Topbar\Products;

use App\Models\Product;
use Livewire\Component;

class Menu extends Component
{
    public string $value = '';

    public $itemdisplay = [];

    public function render()
    {
        return view('livewire..topbar.products.menu');
    }

    public function mount()
    {
        $this->itemdisplay = Product::all()->random(4);
    }

    public function componentsbutton()
    {
        $this->value = 'components';

        //        $this->itemdisplay = Comp
    }

    public function accessoriesbutton()
    {
        $this->value = 'accessories';
    }

    public function peripheralsbutton()
    {
        $this->value = 'peripherals';
    }

    public function bestsellersbutton()
    {
        $this->value = 'bestsellers';
    }

    public function allproductsbutton()
    {
        $this->value = 'allproducts';

        //        sleep(3);

        //        $this->itemdisplay = Product::all()->random(4);

        //        dd($this->itemdisplay);

    }

    public function allproductsbuttonclick()
    {
        return redirect()->route('index_shop');
    }
}

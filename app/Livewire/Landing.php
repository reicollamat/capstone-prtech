<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class Landing extends Component
{

    public $products;

    public function mount(){
        $this->products = Product::all();
    }

    public function placeholder()
    {
        return <<<'HTML'
        <div>
            <p1>loading</p1>
        </div>
        HTML;
    }


    public function render()
    {
        return view('livewire.landing')->extends('layouts.master_layout')->section('test');
    }
}

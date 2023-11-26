<?php

namespace App\Livewire\Component;

use App\Models\CaseFan;
use App\Models\ComputerCase;
use App\Models\Cpu;
use App\Models\CpuCooler;
use App\Models\ExtStorage;
use App\Models\Headphone;
use App\Models\IntStorage;
use App\Models\Keyboard;
use App\Models\Memory;
use App\Models\Monitor;
use App\Models\Motherboard;
use App\Models\Mouse;
use App\Models\Product;
use App\Models\Psu;
use App\Models\Speaker;
use App\Models\VideoCard;
use App\Models\Webcam;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ProductListComponent extends Component
{
    public Model $item;

    public Model $itemproductinfo;

    private $categoryMap = [
        'computer_case' => ComputerCase::class,
        'case_fan' => CaseFan::class,
        'cpu' => Cpu::class,
        'cpu_cooler' => CpuCooler::class,
        'ext_storage' => ExtStorage::class,
        'int_storage' => IntStorage::class,
        'headphone' => Headphone::class,
        'keyboard' => Keyboard::class,
        'memory' => Memory::class,
        'monitor' => Monitor::class,
        'motherboard' => Motherboard::class,
        'mouse' => Mouse::class,
        'psu' => Psu::class,
        'speaker' => Speaker::class,
        'video_card' => VideoCard::class,
        'webcam' => Webcam::class,
    ];

    /**
     * @throws BindingResolutionException
     */
    public function mount($item, $itemProductInfo)
    {

        //        dd($itemProductInfo->slug);
        //        $this->item = Product::join($item->category, $item->id, '=', $item->category . '.product.id');

        //        dd(Product::join($item->category, $item->id, '=', $item->category . '.product.id'));
        //        $test = DB::table($item->category)->join('products', $item->category . '.product_id', '=', 'products.id');

        //        dd($item->category . '.product_id');
        //        dd($test);
        // Check if the category exists in the category map
        if (array_key_exists($item->category, $this->categoryMap)) {
            // Get the corresponding model class for the category
            $modelClass = $this->categoryMap[$item->category];

            // Resolve the model using the model class and product_id
            $this->item = app()->make($modelClass)->where('product_id', $item->id)->first();

        //            $this->item = app()->make($modelClass)
        //                ->join('products', , '=', 'products.id')
        //                ->where('product_id', $item->id)->first();
        //
        //            dd($this->item);
        } else {
            // Handle the case when the category doesn't exist
            abort(404);
        }
        //        dd($this->item);
        $this->itemproductinfo = $itemProductInfo;

        //        $this->__unset($this->getAttribute);
        //        dd($this->itemProductInfo);

        //        dd(base_path('resources/views/compo'));
    }

    public function render()
    {
        return view('livewire.component.product-list-component');
    }

    public function save()
    {

    }
}

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

class OrderListComponent extends Component
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
        //
    }

    public function render()
    {
        $this->orderstatus_options = ['pending', 'completed', 'to_ship', 'shipping'];

        $this->paymentstatus_options = ['paid', 'unpaid'];

        return view('livewire.component.order-list-component');
    }

    public function save()
    {
    }
}

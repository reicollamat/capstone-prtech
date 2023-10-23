<?php

namespace App\Livewire;

use App\Models\CaseFan;
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
use Livewire\Component;

class Landing extends Component
{

    public $products;
    public $case_fan;
    public $computer_case;

    public $cpu;
    public $cpu_cooler;
    public $ext_storage;
    public $headphone;
    public $int_storage;
    public $keyboard;
    public $memory;
    public $monitor;
    public $motherboard;
    public $mouse;
    public $psu;
    public $speaker;
    public $video_card;
    public $webcam;



    public function mount()
    {

        //        $this->products = Product::all();
        //        $this->cpu = Cpu::all();
        //        $this->cpu_cooler = CpuCooler::all();
        //        $this->ext_storage = ExtStorage::all();
        //        $this->headphone = Headphone::all();
        //        $this->int_storage = IntStorage::all();
        //        $this->keyboard = Keyboard::all();
        //        $this->memory = Memory::all();
        //        $this->monitor = Monitor::all();
        //        $this->motherboard = Motherboard::all();
        //        $this->mouse = Mouse::all();
        //        $this->psu = Psu::all();
        //        $this->speaker = Speaker::all();
        //        $this->video_card = VideoCard::all();
        //        $this->webcam = Webcam::all();
        //        $this->case_fan = CaseFan::all();
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
        return view('livewire.landing');
    }

    // login-register test
    public function login()
    {
        return view('layouts.login-register-layout');
    }
    public function register()
    {
        return view('layouts.login-register-layout');
    }
}

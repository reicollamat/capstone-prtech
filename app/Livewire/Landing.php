<?php

namespace App\Livewire;

use App\Mail\OrderShipped;
use Exception;
use Illuminate\Support\Facades\Mail;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Usernotnull\Toast\Concerns\WireToast;

class Landing extends Component
{
    use LivewireAlert;
    use WithPagination;

    public int $count = 0;

    public function mount()
    {
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

    #[On('wishlist-item-remount')]
    public function increment()
    {
        $this->count++;
    }

    public string $mailStatus;

    public function sendMail()
    {
        // hinde ko alam kung bakit pero pag unang pindot dito nag rereload ung page, pero minsan inde naman
        // TODO: pass the id of order inside OrderShipped function, then query the order based on that id on the OrderShipped.php to display the items and total??
        try {
            Mail::to('raycollamat11@gmail.com')->send(new OrderShipped());
            $this->mailStatus = 'Email Sent';
        } catch (Exception $e) {
            $this->mailStatus = 'There was an error sending the email: '.$e->getMessage();
        }
    }

    public function tryAlert()
    {
        $this->alert('question', 'How are you today?', [
            'showConfirmButton' => true,
            'confirmButtonText' => 'Good',
            'onConfirmed' => 'confirmed'
        ]);
        // $this->alert('success', 'Successssssssssssssssssssssss', [
        //     'position' => 'top-end']);
        //
        // $this->redirectRoute('collections');
        // $this->alert('error', 'Success', [
        //     'position' => 'top-end']);
        // $this->alert('success', 'Success is approaching!');
        // dd('tse');
    }
}

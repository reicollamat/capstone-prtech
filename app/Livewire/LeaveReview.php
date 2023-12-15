<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Product;
use App\Models\PurchaseItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Livewire\Attributes\Url;

class LeaveReview extends Component
{
    public $user;
    public $rating_value = 1;
    public $purchase_item;
    public $review_text;

    public function mount($purchase_item_id)
    {
        $this->user = Auth::user();

        $this->purchase_item = PurchaseItem::find($purchase_item_id);
        // dd($this->purchase_item);
    }

    public function review_page(Request $request)
    {
        $this->purchase_item = PurchaseItem::find($request->purchase_item_id);

        dd($this->purchase_item);
        return view('livewire.leave-review');
    }

    public function submit_review()
    {
        $product = Product::find($this->purchase_item->product_id);

        $comment = Comment::create([
            'user_id' => $this->user->id,
            'product_id' => $product->id,
            'seller_id' => $product->seller_id,
            'text' => $this->review_text,
            'rating' => $this->rating_value,
        ]);

        $this->purchase_item->update([
            'comment_id' => $comment->id,
        ]);

        return Redirect::route('profile.edit', ['profile_activetab' => 'purchases'])->with('notification', 'Product review for ' . $product->title . ' completed!');
    }

    public function render()
    {
        return view('livewire.leave-review');
    }
}

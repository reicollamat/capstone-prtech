<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Product;
use App\Models\PurchaseItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class LeaveReview extends Component
{
    public $user;

    public $rating_value = 1;

    public $purchase_item;
    public $review_text;

    public $response;

    public $response2;

    public int $sentimentfromapi;

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
        // sleep(10);
        // dd($this->review_text);
        $product = Product::find($this->purchase_item->product_id);

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer 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',
        ])
            ->post('https://api-inference.huggingface.co/models/magixxixx/pr-tech-sentiment-analyzer', [
                'inputs' => 'handy Value For Moneylegit super fast transfering datas Must buy',
            ]);

        if ($response->successful()) {

            // Access the response data
            $data = $response->json();

            // dd($data);

            $result1 = $data[0][0];
            $result2 = $data[0][1];

            // Accessing scores
            $score1 = $result1['score'];
            $score2 = $result2['score'];

            // Determine the higher score and its label
            if ($score1 > $score2) {
                $higherLabel = $result1['label'];
                $higherScore = $score1;
            } else {
                $higherLabel = $result2['label'];
                $higherScore = $score2;
            }

            // Determine the result based on the higher label
            $this->response2 = ($higherLabel === 'POSITIVE') ? 1 : 0;
            $this->sentimentfromapi = ($higherLabel === 'POSITIVE') ? 1 : 0;

            // Do something with the response data
            $this->response = [$score1, $score2, $higherLabel, round($higherScore,0)];
        }

        $comment = Comment::create([
            'user_id' => $this->user->id,
            'product_id' => $product->id,
            'seller_id' => $product->seller_id,
            'text' => $this->review_text,
            'rating' => $this->rating_value,
            'sentiment' => $this->sentimentfromapi,
        ]);

        $this->purchase_item->update([
            'comment_id' => $comment->id,
        ]);

        return Redirect::route('profile.edit', ['profile_activetab' => 'purchases'])->with('notification', 'Product review for '.$product->title.' completed!');
    }

    public function render()
    {
        return view('livewire.leave-review');
    }
}

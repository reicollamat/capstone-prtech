<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\PurchaseItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Livewire\Component;




class Landing extends Component
{
    public $shop_name;
    public function mount()
    {
        $seller_id = auth()->user()->seller->id;
        $this->shop_name = auth()->user()->seller->shop_name; # get shop name
        // $product = PurchaseItem::where('seller_id', auth()->user()->id)->get();


        $p_id = [];

        // get all product id that bellows to the seller_id in Products table
        $product = Product::where('seller_id', $seller_id)
            ->select('id')
            ->get()
            ->toArray();

        foreach ($product as $key => $value) {
            $p_id[] = $value['id'];
        }

        $seller_products = DB::select('select `product_id`,
               pi.`created_at`,
               p.`title`  as `product_title`,
               `total_price` as `unit_price`,
               sum(quantity)    as total_quantity,
               sum(total_price) as sales_day
        from purchase_items pi
                 join products p on p.id = pi.product_id
        where `product_id` in (' . implode(',', $p_id) . ')
        group by `created_at`, `product_id`, p.`title`, pi.`created_at`, `product_id`, `total_price`
        order by `created_at`;');

        // send to api
        try {
            $response = Http::post('http://127.0.0.1:8787/sales', [
                'shop_id' => $seller_id,
                'shop_name' => $this->shop_name,
                'products' => $seller_products
            ]);

            if ($response->ok()) {
                dd($response->json());
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        dd($seller_products);

        // dd($seller_id);
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
}

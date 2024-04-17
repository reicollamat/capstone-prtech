<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Landing extends Component
{
    public $shop_name;

    public $seller_id;

    public $loading = true;

    public $pdfpath;

    public function mount()
    {
        $this->seller_id = auth()->user()->seller->id;
        $this->shop_name = auth()->user()->seller->shop_name; // get shop name
        // $product = PurchaseItem::where('seller_id', auth()->user()->id)->get();

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

    public function test()
    {
        $this->loading = true;

        $p_id = [];

        // get all product id that bellows to the seller_id in Products table
        $product = Product::where('seller_id', $this->seller_id)
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
        where `product_id` in ('.implode(',', $p_id).')
        group by `created_at`, `product_id`, p.`title`, pi.`created_at`, `product_id`, `total_price`
        order by `created_at`;');

        // send to api
        try {
            $response = Http::post('http://127.0.0.1:8787/sales', [
                'shop_id' => $this->seller_id,
                'shop_name' => $this->shop_name,
                'products' => $seller_products,
                'quarter' => 'N/A',
                'category' => 'All',
            ]);

            if ($response->ok()) {
                // accept application/pdf response
                $pdf = $response->body();

                // save to file
                $file = public_path('sales.pdf');
                file_put_contents($file, $pdf);

                $this->pdfpath = $file;

                $this->loading = false;

                $this->dispatch('reload-iframe');

                // if (file_exists($file)) {
                //     return response()->download($file);
                // }

            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}

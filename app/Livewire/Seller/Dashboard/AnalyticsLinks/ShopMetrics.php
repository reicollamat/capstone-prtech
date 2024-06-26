<?php

namespace App\Livewire\Seller\Dashboard\AnalyticsLinks;

use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Component;

#[Layout('layouts.seller.seller-layout')]
class ShopMetrics extends Component
{
    use LivewireAlert;
    #[Locked]
    public $seller_id;

    public int $mostPositiveReviewFilter;

    public int $mostNegativeReviewFilter;

    public int $mostBoughtProductsFilter;

    public int $recentlyBoughtProductsFilter;

    public int $productsReturnsFilter;

    public string $productsReturnsOrderFilter;

    public int $mostOrderedProductsFilter;

    public int $mostShippedProductsFilter;

    public string $p_asset;

    public string $n_asset;

    public $seller_name;

    public $sales_report_filter;

    public $report_quarterly;

    public function mount()
    {

        // FILTER
        //////////////////////////////////////////////////////////////////////

        $seller = auth()->user()->seller;

        $p_id = [];
        // get all product id that bellows to the seller_id in Products table
        $product = Product::where('seller_id', $seller->id)
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

        // dd($seller_products);

        // // QUARTERLY
        // $quartersByYear = [];
        //
        // foreach ($seller_products as $product) {
        //     $createdYear = date('Y', strtotime($product->created_at));
        //     $createdMonth = date('m', strtotime($product->created_at));
        //     $quarter = ceil($createdMonth / 3);
        //     if (! isset($quartersByYear[$createdYear])) {
        //         $quartersByYear[$createdYear] = [
        //             'Q1' => [],
        //             'Q2' => [],
        //             'Q3' => [],
        //             'Q4' => [],
        //         ];
        //     }
        //     $quartersByYear[$createdYear]['Q'.$quarter][] = $product;
        // }
        // // dd($quartersByYear);
        //
        // $q1 = $quartersByYear[2024]['Q1'];
        // $q2 = $quartersByYear[2024]['Q2'];
        // $q3 = $quartersByYear[2024]['Q3'];
        // $q4 = $quartersByYear[2024]['Q4'];
        //
        // // MONTHLY
        // $monthsByYear = [];
        // foreach ($seller_products as $product) {
        //     $createdYear = date('Y', strtotime($product->created_at));
        //     $createdMonth = date('m', strtotime($product->created_at));
        //     if (! isset($monthsByYear[$createdYear])) {
        //         $monthsByYear[$createdYear] = [];
        //     }
        //     if (! isset($monthsByYear[$createdYear][$createdMonth])) {
        //         $monthsByYear[$createdYear][$createdMonth] = [];
        //     }
        //     $monthsByYear[$createdYear][$createdMonth][] = $product;
        // }
        // // dd($monthsByYear);
        //
        // $january = $monthsByYear[2024]['01'];
        // $february = $monthsByYear[2024]['02'];
        // $march = $monthsByYear[2024]['03'];
        // $april = $monthsByYear[2024]['04'];

        // BY PRODUCT CATEGORY
        // $productByCategory = [];
        // foreach ($seller_products as $key => $product) {
        //     $prod_category = Product::find($product->product_id)->category;
        //     // dd($prod_category);
        //     if (! isset($productByCategory[$prod_category])) {
        //         $productByCategory[$prod_category] = [];
        //     }
        //     if (! isset($productByCategory[$prod_category][$product->product_id])) {
        //         $productByCategory[$prod_category][$product->product_id] = [];
        //     }
        //     $productByCategory[$prod_category][$product->product_id][] = $product;
        // }
        // // dd($productByCategory);
        //
        // if (isset($productByCategory['computer_case'])) {
        //     $computer_case_products = $productByCategory['computer_case'];
        // } else {
        //     $computer_case_products = [];
        // }
        // if (isset($productByCategory['case_fan'])) {
        //     $case_fan_products = $productByCategory['case_fan'];
        // } else {
        //     $case_fan_products = [];
        // }
        // if (isset($productByCategory['cpu'])) {
        //     $cpu_products = $productByCategory['cpu'];
        // } else {
        //     $cpu_products = [];
        // }
        // if (isset($productByCategory['cpu_cooler'])) {
        //     $cpu_cooler_products = $productByCategory['cpu_cooler'];
        // } else {
        //     $cpu_cooler_products = [];
        // }
        // if (isset($productByCategory['ext_storage'])) {
        //     $ext_storage_products = $productByCategory['ext_storage'];
        // } else {
        //     $ext_storage_products = [];
        // }
        // if (isset($productByCategory['int_storage'])) {
        //     $int_storage_products = $productByCategory['int_storage'];
        // } else {
        //     $int_storage_products = [];
        // }
        // if (isset($productByCategory['headphone'])) {
        //     $headphone_products = $productByCategory['headphone'];
        // } else {
        //     $headphone_products = [];
        // }
        // if (isset($productByCategory['keyboard'])) {
        //     $keyboard_products = $productByCategory['keyboard'];
        // } else {
        //     $keyboard_products = [];
        // }
        // if (isset($productByCategory['memory'])) {
        //     $memory_products = $productByCategory['memory'];
        // } else {
        //     $memory_products = [];
        // }
        // if (isset($productByCategory['monitor'])) {
        //     $monitor_products = $productByCategory['monitor'];
        // } else {
        //     $monitor_products = [];
        // }
        // if (isset($productByCategory['motherboard'])) {
        //     $motherboard_products = $productByCategory['motherboard'];
        // } else {
        //     $motherboard_products = [];
        // }
        // if (isset($productByCategory['mouse'])) {
        //     $mouse_products = $productByCategory['mouse'];
        // } else {
        //     $mouse_products = [];
        // }
        // if (isset($productByCategory['psu'])) {
        //     $psu_products = $productByCategory['psu'];
        // } else {
        //     $psu_products = [];
        // }
        // if (isset($productByCategory['speaker'])) {
        //     $speaker_products = $productByCategory['speaker'];
        // } else {
        //     $speaker_products = [];
        // }
        // if (isset($productByCategory['video_card'])) {
        //     $video_card_products = $productByCategory['video_card'];
        // } else {
        //     $video_card_products = [];
        // }
        // if (isset($productByCategory['webcam'])) {
        //     $webcam_products = $productByCategory['webcam'];
        // } else {
        //     $webcam_products = [];
        // }
        // dd($computer_case_products);

        //////////////////////////////////////////////////////////////////////
        // FILTER

        $this->seller_id = auth()->user()->seller->id;

        $this->seller_name = auth()->user()->seller->shop_name ?? 'PR-Tech';

        $this->sales_report_filter = 'quarterly';

        // dd($this->seller_id);

        $this->mostPositiveReviewFilter = 30;
        $this->mostNegativeReviewFilter = 30;
        $this->mostBoughtProductsFilter = 30;
        $this->mostOrderedProductsFilter = 30;
        $this->mostShippedProductsFilter = 30;
        $this->recentlyBoughtProductsFilter = 30;
        $this->productsReturnsFilter = 30;
        $this->productsReturnsOrderFilter = 'desc';
    }

    #[Computed]
    public function getMostBoughtProducts()
    {

        $all_products = Product::where('seller_id', $this->seller_id)
            ->orderBy('purchase_count', 'desc')
            ->take(10)
            ->get();

        // dd($all_products[0]->purchase_count);

        return $all_products;
    }

    #[Computed]
    public function getRecentlyBoughtProducts()
    {

        if ($this->recentlyBoughtProductsFilter > 0) {
            $all_products = DB::select('select p2.id, p2.title, p2.category, sum(pi.quantity) as total_quantity
            from purchases p
                     join purchase_items pi on p.id = pi.purchase_id
                     join products p2 on pi.product_id = p2.id
            where pi.created_at >= DATE_SUB(NOW(), INTERVAL '.$this->recentlyBoughtProductsFilter.' DAY)
            AND p.purchase_status = "completed"
            AND p2.seller_id = '.$this->seller_id.'
            group by pi.product_id,p2.id,p2.title,p2.category');

            // dd($all_products);

            return $all_products;
        }
    }

    #[Computed]
    public function getReturnsProducts()
    {

        if ($this->productsReturnsFilter > 0) {
            $all_products = DB::select('select p2.id, p2.title, p2.category, sum(pi.quantity) as total_quantity
                from item_returnrefund_infos iri
                         join purchases p on iri.purchase_item_id = p.id
                         join purchase_items pi on p.id = pi.purchase_id
                         join products p2 on pi.product_id = p2.id
                where iri.request_date >= DATE_SUB(NOW(), INTERVAL '.$this->productsReturnsFilter.' DAY)
                  AND iri.seller_id = '.$this->seller_id.'
                group by pi.product_id, p2.id, p2.title, p2.category
                order by total_quantity '.$this->productsReturnsOrderFilter.'
                limit 10');

            //
            // dd($all_products);
            //
            return $all_products;
        }
    }

    #[Computed]
    public function getMostPositiveReviewedProducts()
    {
        if ($this->mostPositiveReviewFilter > 0) {

            $all_products = DB::select('SELECT
                product_id,
                p.title,
                p.category,
                SUM(c.rating) / COUNT(*) AS average_rating,
                count(*) AS total_comment
            FROM
                comments c
                    JOIN products p ON c.product_id = p.id
            WHERE c.created_at >= DATE_SUB(NOW(), INTERVAL '.$this->mostPositiveReviewFilter.' DAY)
                AND c.seller_id = '.$this->seller_id.' and c.rating >= 3
            GROUP BY
                c.product_id, p.title, product_id, p.category
            ORDER BY
                average_rating DESC');

            return $all_products;
        }

    }

    #[Computed]
    public function getMostNegativeReviewedProducts()
    {
        if ($this->mostNegativeReviewFilter > 0) {

            $all_products = DB::select('SELECT
                product_id,
                p.title,
                p.category,
                SUM(c.rating) / COUNT(*) AS average_rating,
                count(*) AS total_comment
            FROM
                comments c
                    JOIN products p ON c.product_id = p.id
            WHERE c.created_at >= DATE_SUB(NOW(), INTERVAL '.$this->mostNegativeReviewFilter.' DAY)
                AND c.seller_id = '.$this->seller_id.' and c.rating <= 2
            GROUP BY
                c.product_id, p.title, product_id, p.category
            ORDER BY
                average_rating DESC');

            // dd($all_products);

            return $all_products;
        }

    }

    #[Computed]
    public function getMostOrderedProducts()
    {

        if ($this->mostOrderedProductsFilter > 0) {
            $all_products = DB::select('SELECT product_id, p.title, p.category, SUM(pi.quantity) AS total_quantity
            FROM purchase_items pi
                     JOIN products p ON pi.product_id = p.id
            WHERE pi.created_at >= DATE_SUB(NOW(), INTERVAL '.$this->mostOrderedProductsFilter.' DAY)
            AND p.seller_id = '.$this->seller_id.'
            GROUP BY product_id,title,category
            order by total_quantity
            limit 10');

            return $all_products;
        }
    }

    #[Computed]
    public function getMostShippedProducts()
    {

        if ($this->mostShippedProductsFilter > 0) {

            $all_products = DB::select('select p2.id, p2.title, p2.category, sum(pi.quantity) as total_quantity
            from purchases p
                     join purchase_items pi on p.id = pi.purchase_id
                     join products p2 on pi.product_id = p2.id
            where pi.created_at >= DATE_SUB(NOW(), INTERVAL '.$this->mostShippedProductsFilter.' DAY)
            AND p2.seller_id = '.$this->seller_id.'
            group by pi.product_id,p2.id,p2.title,p2.category');

            return $all_products;
        }
    }

    public function render()
    {
        return view('livewire..seller.dashboard.analytics-links.shop-metrics');
    }

    public $filterQuarterly = 'all';

    public $filterMonth = null;

    public $filterCategory = null;

    public string $pdfpath;

    public bool $loading = true;

    public bool $showIframe = false;

    public function generateAll()
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
            $response = Http::post('http://127.0.0.1:8484/sales', [
                'shop_id' => $this->seller_id,
                'shop_name' => $this->seller_name,
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

                $this->showIframe = true;

                $this->dispatch('reload-iframe');

            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function generateFilter()
    {
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

        // dd($seller_products);

        // QUARTERLY
        $quartersByYear = [];

        foreach ($seller_products as $product) {
            $createdYear = date('Y', strtotime($product->created_at));
            $createdMonth = date('m', strtotime($product->created_at));
            $quarter = ceil($createdMonth / 3);
            if (! isset($quartersByYear[$createdYear])) {
                $quartersByYear[$createdYear] = [
                    'Q1' => [],
                    'Q2' => [],
                    'Q3' => [],
                    'Q4' => [],
                ];
            }
            $quartersByYear[$createdYear]['Q'.$quarter][] = $product;
        }
        // dd($quartersByYear);

        // $q1 = $quartersByYear[2024]['Q1'];
        // $q2 = $quartersByYear[2024]['Q2'];
        // $q3 = $quartersByYear[2024]['Q3'];
        // $q4 = $quartersByYear[2024]['Q4'];

        $sql = null;

        if ($this->filterQuarterly == 'all') {
            $q1 = $quartersByYear[2024]['Q1'];
            $q2 = $quartersByYear[2024]['Q2'];
            $q3 = $quartersByYear[2024]['Q3'];
            $q4 = $quartersByYear[2024]['Q4'];
        } elseif ($this->filterQuarterly == 'q1') {
            $sql = $quartersByYear[2024]['Q1'];
        } elseif ($this->filterQuarterly == 'q2') {
            $sql = $quartersByYear[2024]['Q2'];
        } elseif ($this->filterQuarterly == 'q3') {
            $sql = $quartersByYear[2024]['Q3'];
        } elseif ($this->filterQuarterly == 'q4') {
            $sql = $quartersByYear[2024]['Q4'];
        } else {
            $sql = $seller_products;
        }

        // MONTHLY
        $monthsByYear = [];
        foreach ($seller_products as $product) {
            $createdYear = date('Y', strtotime($product->created_at));
            $createdMonth = date('m', strtotime($product->created_at));
            if (! isset($monthsByYear[$createdYear])) {
                $monthsByYear[$createdYear] = [];
            }
            if (! isset($monthsByYear[$createdYear][$createdMonth])) {
                $monthsByYear[$createdYear][$createdMonth] = [];
            }
            $monthsByYear[$createdYear][$createdMonth][] = $product;
        }
        // dd($monthsByYear);

        $january = $monthsByYear[2024]['01'];
        $february = $monthsByYear[2024]['02'];
        $march = $monthsByYear[2024]['03'];
        $april = $monthsByYear[2024]['04'];

        if ($this->filterMonth == '1') {
            $sql = $january;
        } elseif ($this->filterMonth == '2') {
            $sql = $february;
        } elseif ($this->filterMonth == '3') {
            $sql = $march;
        } elseif ($this->filterMonth == '4') {
            $sql = $april;
        } else {
            $sql = $seller_products;
        }

        if ($this->filterCategory) {
            $product = Product::where('seller_id', $this->seller_id)
                ->where('category', $this->filterCategory)
                ->get()
                ->toArray();

            // dd($product);

            if (empty($product)) {
                $this->alert('warning', 'No Products', [
                    'position' => 'top-end',
                    'timer' => 3000,
                    'toast' => true,
                    'text' => 'There are no products in this category. Please select another category.',
                    'showCancelButton' => false,
                    'showConfirmButton' => false,
                ]);
                return;
            }

            // dd($product);
            $p_id = [];

            foreach ($product as $key => $value) {
                $p_id[] = $value['id'];
            }
            // dd($p_id);

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

            if (empty($seller_products)) {
                $this->alert('warning', 'No Sales on This Product Yet', [
                    'position' => 'top-end',
                    'timer' => 3000,
                    'toast' => true,
                    'text' => 'There are no sales on this product yet. Please select another product category',
                    'showCancelButton' => false,
                    'showConfirmButton' => false,
                ]);
                return;
            }
            $sql = $seller_products;
        }

        // BY PRODUCT CATEGORY

        // dd($sql);

        // send to api
        try {
            $response = Http::post('http://127.0.0.1:8484/sales', [
                'shop_id' => $this->seller_id,
                'shop_name' => $this->seller_name,
                'products' => $sql,
                'quarter' => strtoupper($this->filterQuarterly),
                'category' => $this->filterCategory ?? 'ALL',
            ]);

            if ($response->ok()) {
                // accept application/pdf response
                $pdf = $response->body();

                // save to file
                $file = public_path('sales.pdf');
                file_put_contents($file, $pdf);

                $this->pdfpath = $file;

                $this->loading = false;

                $this->showIframe = true;

                $this->dispatch('reload-iframe');

            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}

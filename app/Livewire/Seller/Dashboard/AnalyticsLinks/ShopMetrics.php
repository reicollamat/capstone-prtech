<?php

namespace App\Livewire\Seller\Dashboard\AnalyticsLinks;

use App\Models\Product;
use App\Models\Seller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Component;

#[Layout('layouts.seller.seller-layout')]
class ShopMetrics extends Component
{
    #[Locked]
    public $seller;

    public int $mostPositiveReviewFilter;

    public int $mostNegativeReviewFilter;

    public int $mostBoughtProductsFilter;

    public int $recentlyBoughtProductsFilter;

    public int $productsReturnsFilter;

    public string $productsReturnsOrderFilter;

    public int $mostOrderedProductsFilter;

    public int $mostShippedProductsFilter;

    public function mount()
    {
        $this->seller = Seller::where('user_id', Auth::id())->get()->first();

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
        // $all_products = Product::where('seller_id', $this->seller->id)
        //     ->where('purchase_count', '>=', 1)
        //     ->orderBy('purchase_count', 'desc')
        //     ->take(5)
        //     ->get();
        // if ($this->mostPositiveReviewFilter > 0) {
        //     $all_products = DB::select('SELECT product_id, p.title, p.category, SUM(pi.quantity) AS total_quantity
        //     FROM purchase_items pi
        //              JOIN products p ON pi.product_id = p.id
        //     WHERE pi.created_at >= DATE_SUB(NOW(), INTERVAL ' .$this->mostBoughtProductsFilter. ' DAY)
        //     AND p.seller_id = ' .$this->seller->id. '
        //     GROUP BY product_id,title,category
        //     order by total_quantity
        //     limit 10');
        //
        //     return $all_products;
        // }

        $all_products = Product::where('seller_id', $this->seller->id)
            ->orderBy('purchase_count', 'desc')
            ->take(10)
            ->get();

        // dd($all_products[0]->purchase_count);

        return $all_products;
    }

    #[Computed]
    public function getRecentlyBoughtProducts()
    {
        // $all_products = Product::where('seller_id', $this->seller->id)
        //     ->where('purchase_count', '>=', 1)
        //     ->orderBy('purchase_count', 'desc')
        //     ->take(5)
        //     ->get();
        if ($this->recentlyBoughtProductsFilter > 0) {
            $all_products = DB::select('select p2.id, p2.title, p2.category, sum(pi.quantity) as total_quantity
            from purchases p
                     join purchase_items pi on p.id = pi.purchase_id
                     join products p2 on pi.product_id = p2.id
            where pi.created_at >= DATE_SUB(NOW(), INTERVAL '.$this->recentlyBoughtProductsFilter.' DAY)
            AND p.purchase_status = "completed"
            AND p2.seller_id = '.$this->seller->id.'
            group by pi.product_id,p2.id,p2.title,p2.category');

            // dd($all_products);

            return $all_products;
        }
    }

    #[Computed]
    public function getReturnsProducts()
    {
        // $all_products = Product::where('seller_id', $this->seller->id)
        //     ->where('purchase_count', '>=', 1)
        //     ->orderBy('purchase_count', 'desc')
        //     ->take(5)
        //     ->get();
        if ($this->productsReturnsFilter > 0) {
            $all_products = DB::select('select p2.id, p2.title, p2.category, sum(pi.quantity) as total_quantity
                from item_returnrefund_infos iri
                         join purchases p on iri.purchase_item_id = p.id
                         join purchase_items pi on p.id = pi.purchase_id
                         join products p2 on pi.product_id = p2.id
                where iri.request_date >= DATE_SUB(NOW(), INTERVAL '.$this->productsReturnsFilter.' DAY)
                  AND iri.seller_id = '.$this->seller->id.'
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
            // $all_products = Comment::where('seller_id', $this->seller->id)
            //     ->where('rating', '>=', 3)
            //     ->where('created_at', '>=', now()->subDays($this->mostPositiveReviewFilter))
            //     // ->groupBy('product_id')
            //     ->orderBy('rating', 'desc')
            //     ->take(10)
            //     ->get();

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
                AND c.seller_id = '.$this->seller->id.' and c.rating >= 3
            GROUP BY
                c.product_id, p.title, product_id, p.category
            ORDER BY
                average_rating DESC');

            return $all_products;
        }
        // $all_products

        // $all_products = Product::where('seller_id', $this->seller->id)
        //     ->where('rating', '>=', 3)
        //     ->orderBy('rating', 'desc')
        //     ->take(10)
        //     ->get();

        // return $all_products;
    }

    #[Computed]
    public function getMostNegativeReviewedProducts()
    {
        if ($this->mostNegativeReviewFilter > 0) {
            // $all_products = Comment::where('seller_id', $this->seller->id)
            //     ->where('rating', '<=', 2)
            //     ->where('created_at', '>=', now()->subDays($this->mostNegativeReviewFilter))
            //     // ->groupBy('product_id')
            //     ->orderBy('rating', 'desc')
            //     ->take(10)
            //     ->get();

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
                AND c.seller_id = '.$this->seller->id.' and c.rating <= 2
            GROUP BY
                c.product_id, p.title, product_id, p.category
            ORDER BY
                average_rating DESC');

            // dd($all_products);

            return $all_products;
        }
        // $all_products = Product::where('seller_id', $this->seller->id)
        //     ->where('rating', '<=', 2)
        //     ->orderBy('rating', 'desc')
        //     ->take(5)
        //     ->get();
        //
        // return $all_products;
    }

    #[Computed]
    public function getMostOrderedProducts()
    {
        // $all_products = Product::where('seller_id', $this->seller->id)
        //     ->where('purchase_count', '>=', 1)
        //     ->orderBy('purchase_count', 'desc')
        //     ->take(5)
        //     ->get();
        if ($this->mostOrderedProductsFilter > 0) {
            $all_products = DB::select('SELECT product_id, p.title, p.category, SUM(pi.quantity) AS total_quantity
            FROM purchase_items pi
                     JOIN products p ON pi.product_id = p.id
            WHERE pi.created_at >= DATE_SUB(NOW(), INTERVAL '.$this->mostOrderedProductsFilter.' DAY)
            AND p.seller_id = '.$this->seller->id.'
            GROUP BY product_id,title,category
            order by total_quantity
            limit 10');

            return $all_products;
        }
    }

    #[Computed]
    public function getMostShippedProducts()
    {
        // $all_products = Product::where('seller_id', $this->seller->id)
        //     ->where('purchase_count', '>=', 1)
        //     ->orderBy('purchase_count', 'desc')
        //     ->take(5)
        //     ->get();
        if ($this->mostShippedProductsFilter > 0) {
            // $all_products = DB::select('SELECT product_id, p.title, p.category, SUM(pi.quantity) AS total_quantity
            // FROM purchase_items pi
            //          JOIN products p ON pi.product_id = p.id
            // WHERE purchase_status = "to_ship"
            // WHERE pi.created_at >= DATE_SUB(NOW(), INTERVAL '.$this->mostBoughtProductsFilter.' DAY)
            // AND p.seller_id = '.$this->seller->id.'
            // GROUP BY product_id,title,category
            // order by total_quantity
            // limit 10');

            $all_products = DB::select('select p2.id, p2.title, p2.category, sum(pi.quantity) as total_quantity
            from purchases p
                     join purchase_items pi on p.id = pi.purchase_id
                     join products p2 on pi.product_id = p2.id
            where pi.created_at >= DATE_SUB(NOW(), INTERVAL '.$this->mostShippedProductsFilter.' DAY)
            AND p2.seller_id = '.$this->seller->id.'
            group by pi.product_id,p2.id,p2.title,p2.category');

            return $all_products;
        }
    }


    public function render()
    {
        return view('livewire..seller.dashboard.analytics-links.shop-metrics');
    }
}

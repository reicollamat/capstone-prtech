<?php

namespace App\Livewire\Shop;


use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use RalphJSmit\Livewire\Urls\Facades\Url as UrlFacade;
use Livewire\WithPagination;
use App\Utils\Paginate;

#[Lazy]
class Collections extends Component
{
    use WithPagination;

    public function placeholder(array $params = [])
    {
        return view('livewire.placeholder.shop-placeholder', $params);
    }

    //    public array $sortoptions = [
    //        'default' => 'Default',
    //        'price-asc' => 'Price: Low to High',
    //        'price-desc' => 'Price: High to Low',
    //        'date-asc' => 'Date: Old to New',
    //        'date-desc' => 'Date: New to Old',
    //        'rating-asc' => 'Rating: Low to High',
    //        'rating-desc' => 'Rating: High to Low',
    //    ];
    //
    //    protected $queryString = [
    //        'sortingby',
    //        'sortdirection'
    //    ];
    //
    //    #[Url(as: 'sortby', history: true, keep: false)]
    //    public string $sortingby = 'purchase_count';
    //    public string $sortname = '';
    //    public $all_products = [];
    //    #[Url(as: 'order', history: true, keep: true)]
    //    public string $sortdirection = 'desc';
    //

    //
    //    public function sortBy(string $name = 'Bestselling', string $sort = 'purchase_count', string $direction = 'desc')
    //    {
    //
    //
    //        $this->sortname = $name;
    //        $this->sortingby = $sort;
    //        $this->sortdirection = $direction;
    //
    //        //        dd($name, $this->sortingby, $direction);
    //
    //
    //        //        dd($name, $sort, $direction);
    //
    //        if ($this->sortingby == 'default') {
    //            $this->all_products = DB::table('products')
    //                ->limit(10)->get();
    //        } else {
    //            $this->all_products = DB::table('products')
    //                ->orderBy($this->sortingby, $this->sortdirection)
    //                ->limit(10)->get();
    //        }
    //
    //    }

    //    #[Computed]
    //    public function getProducts()
    //    {
    //        return Product::paginate(10);
    //
    //    }

    public function mount()
    {
        //        //        sleep(10);
        //        //      get the current url and parse it to get query string
        //        parse_str(parse_url(UrlFacade::current(), PHP_URL_QUERY), $queryarray);
        //
        //        //        dd($queryarray);
        //
        //        if ($queryarray) {
        //            $this->sortingby = $queryarray['sortingby'] ?? 'default';
        //            $this->sortdirection = $queryarray['sortdirection'] ?? 'desc';
        //
        //
        //            //            dd($this->sortingby, $this->sortdirection);
        //
        //            switch ($this->sortingby) {
        //                case 'title':
        //                    if ($this->sortdirection == 'asc') {
        //                        $this->sortBy('Alphabetically: A to Z', 'title', 'asc');
        //                    } elseif ($this->sortdirection == 'desc') {
        //                        $this->sortBy('Alphabetically: Z to A', 'title', 'desc');
        //                    }
        //                    break;
        //
        //                case 'price':
        //                    if ($this->sortdirection == 'asc') {
        //                        $this->sortBy('Price: Low to High', 'price', 'asc');
        //                    } elseif ($this->sortdirection == 'desc') {
        //                        $this->sortBy('Price: High to Low', 'price', 'desc');
        //                    }
        //                    break;
        //
        //                case 'date':
        //                    if ($this->sortdirection == 'asc') {
        //                        $this->sortBy('Date: Old to New', 'created_at', 'asc');
        //                    } elseif ($this->sortdirection == 'desc') {
        //                        $this->sortBy('Date: New to Old', 'created_at', 'desc');
        //                    }
        //                    break;
        //
        //                case 'rating':
        //                    if ($this->sortdirection == 'asc') {
        //                        $this->sortBy('Rating: Low to High', 'rating', 'asc');
        //                    } elseif ($this->sortdirection == 'desc') {
        //                        $this->sortBy('Rating: High to Low', 'rating', 'desc');
        //                    }
        //                    break;
        //
        //                default:
        //                    $this->sortname = 'Bestselling';
        //                    //                    $this->sortingby = 'purchase_count';
        //                    //                    $this->sortdirection = 'desc';
        //
        //                    //                    $this->all_products = DB::table('products')
        //                    request()->url();
        //
        //                    //                    $this->all_products = DB::table('products')
        //                    //                        ->orderBy('purchase_count', 'desc')
        //                    //                        ->limit(20)
        //                    //                        ->paginate(5);
        //
        //                    break;
        //            }
        //
        //        } else {
        //            $this->sortname = 'Bestselling';
        //            //            $this->sortingby = 'purchase_count';
        //            //            $this->sortdirection = 'desc';
        //
        //            //            $this->all_products = DB::table('products')
        //            //                ->orderBy('purchase_count', 'desc')
        //            //                ->limit(20)
        //            //                ->paginate(5);
        //        }
        //
        //        //        $this->sortBy();
    }

    public function render()
    {
        $all_products = Product::paginate(10);
        return view('livewire..shop.collections', ['all_products' => $all_products]);
    }

}

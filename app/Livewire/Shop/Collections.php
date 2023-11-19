<?php

namespace App\Livewire\Shop;


use App\Models\Bookmark;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use RalphJSmit\Livewire\Urls\Facades\Url as UrlFacade;
use Livewire\WithPagination;

//#[Lazy]
class Collections extends Component
{
    use WithPagination;

    #[Locked]
    public $userid;

    public function placeholder(array $params = [])
    {
        return view('livewire.placeholder.shop-placeholder', $params);
    }

    public array $sortoptions = [
        'default' => 'Default',
        'price-asc' => 'Price: Low to High',
        'price-desc' => 'Price: High to Low',
        'date-asc' => 'Date: Old to New',
        'date-desc' => 'Date: New to Old',
        'rating-asc' => 'Rating: Low to High',
        'rating-desc' => 'Rating: High to Low',
    ];

    protected $queryString = [
        'sortingby',
        'sortdirection',
        'category_filter_url',
        'conditon_filter_url',
        'star_rating_url',
        'price_bracket_url'

    ];

    #[url(history: true)]
    public $search;

    #[Url(as: 'cat-filter', history: true, keep: false)]
    public $category_filter = [];
    #[Url(as: 'con-filter', history: true, keep: false)]
    public $conditon_filter = [];
    #[Url(as: 'rating', history: true, keep: false)]
    public $star_rating_url = [];
    #[Url(as: 'p-filter', history: true, keep: false)]
    public $price_bracket_url = [];

    #[Url(as: 'sortby', history: true, keep: false)]
    public string $sortingby = 'purchase_count';
    public string $sortname = '';
    public $all_products;
    #[Url(as: 'order', history: true, keep: true)]
    public string $sortdirection = 'desc';


    public function sortBy(string $name = 'Bestselling', string $sort = 'purchase_count', string $direction = 'desc')
    {

        $this->sortname = $name;
        $this->sortingby = $sort;
        $this->sortdirection = $direction;

        //        dd('test');
        //        if ($this->sortingby == 'default') {
        //            $this->all_products = DB::table('products')
        //                ->limit(10)->get();
        //        } else {
        //            $this->all_products = DB::table('products')
        //                ->orderBy($this->sortingby, $this->sortdirection)
        //                ->limit(10)->get();
        //        }

    }

    #[Computed]
    public function getProducts()
    {
        if ($this->search && $this->category_filter && $this->conditon_filter) {
            return Product::where('title', 'ilike', "%{$this->search}%")
                ->whereIn('category', $this->category_filter)
                ->whereIn('condition', $this->conditon_filter)
                ->orderBy($this->sortingby, $this->sortdirection)
                ->paginate(12);
        }

        if ($this->search && $this->category_filter) {
            return Product::where('title', 'ilike', "%{$this->search}%")
                ->whereIn('category', $this->category_filter)
                ->orderBy($this->sortingby, $this->sortdirection)
                ->paginate(12);
        }
        if ($this->search && $this->conditon_filter) {
            return Product::where('title', 'ilike', "%{$this->search}%")
                ->whereIn('condition', $this->conditon_filter)
                ->orderBy($this->sortingby, $this->sortdirection)
                ->paginate(12);
        }

        if ($this->category_filter && $this->conditon_filter) {
            return Product::whereIn('condition', $this->conditon_filter)->whereIn('category', $this->category_filter)
                ->orderBy($this->sortingby, $this->sortdirection)
                ->paginate(12);
        }

        if ($this->category_filter) {
            return Product::whereIn('category', $this->category_filter)
                ->orderBy($this->sortingby, $this->sortdirection)
                ->paginate(12);
        }

        if ($this->conditon_filter) {
            return Product::whereIn('condition', $this->conditon_filter)
                ->orderBy($this->sortingby, $this->sortdirection)
                ->paginate(12);
        }

        if ($this->search) {
            return Product::where('title', 'ilike', "%{$this->search}%")
                ->orderBy($this->sortingby, $this->sortdirection)
                ->paginate(12);
        }

        if ($this->sortingby && $this->sortdirection) {
            return Product::orderBy($this->sortingby, $this->sortdirection)->paginate(12);
        } else {
            return Product::paginate(12);
        }

    }

    public function boot()
    {

    }

    public function mount()
    {
        $this->userid = Auth::user()->id ?? null;


        $this->all_products = DB::table('products')->get();

        //      get the current url and parse it to get query string
        parse_str(parse_url(UrlFacade::current(), PHP_URL_QUERY), $queryarray);
        //
        //        //        dd($queryarray);
        //
        if ($queryarray) {
            $this->sortingby = $queryarray['sortingby'] ?? 'purchase_count';
            $this->sortdirection = $queryarray['sortdirection'] ?? 'desc';


            //            dd($this->sortingby, $this->sortdirection);

            switch ($this->sortingby) {
                case 'title':
                    if ($this->sortdirection == 'asc') {
                        $this->sortBy('Alphabetically: A to Z', 'title', 'asc');
                    } elseif ($this->sortdirection == 'desc') {
                        $this->sortBy('Alphabetically: Z to A', 'title', 'desc');
                    }
                    break;

                case 'price':
                    if ($this->sortdirection == 'asc') {
                        $this->sortBy('Price: Low to High', 'price', 'asc');
                    } elseif ($this->sortdirection == 'desc') {
                        $this->sortBy('Price: High to Low', 'price', 'desc');
                    }
                    break;

                case 'date':
                    if ($this->sortdirection == 'asc') {
                        $this->sortBy('Date: Old to New', 'created_at', 'asc');
                    } elseif ($this->sortdirection == 'desc') {
                        $this->sortBy('Date: New to Old', 'created_at', 'desc');
                    }
                    break;

                case 'rating':
                    if ($this->sortdirection == 'asc') {
                        $this->sortBy('Rating: Low to High', 'rating', 'asc');
                    } elseif ($this->sortdirection == 'desc') {
                        $this->sortBy('Rating: High to Low', 'rating', 'desc');
                    }
                    break;

                default:
                    $this->sortname = 'Bestselling';
                    break;
            }

        } else {
            $this->sortname = 'Bestselling';
            //            $this->sortingby = 'purchase_count';
            //            $this->sortdirection = 'desc';

            //            $this->all_products = DB::table('products')
            //                ->orderBy('purchase_count', 'desc')
            //                ->limit(20)
            //                ->paginate(5);
        }

        //        //        $this->sortBy();
    }

    public function addtowishlist($item_id)
    {
        if (Auth::check()) {
            if (Bookmark::where(['user_id' => $this->userid, 'product_id' => $item_id])->doesntExist()) {
                Bookmark::firstOrCreate(['user_id' => $this->userid, 'product_id' => $item_id]);
                // create an event to update the count of wihshlist items
                $this->dispatch('wishlist-item-change');
            }
        } else {
            $this->redirect(route('login'));
        }
        //        dd($item_id);
    }

    public function render()
    {

        return view('livewire..shop.collections');
    }

}

<?php

namespace App\Livewire\Shop;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Url;
use Livewire\Component;

use RalphJSmit\Livewire\Urls\Facades\Url as UrlFacade;

class CollectionFilter extends Component
{


    public $all_products;

    #[Url(as: 'filter', history: true, keep: false)]
    public $category_filter = ['cpu'];

    #[Url(as: 'condition', history: true, keep: false)]
    public $conditon_filter = [];

    #[Url(as: 'rating', history: true, keep: false)]
    public $star_rating = [];

    #[Url(as: 'price', history: true, keep: false)]
    public $price_bracket = [];

    public $queryarray = [];

    protected $queryString = ['category_filter', 'conditon_filter'];

    public $currentUrl;

    public $stringurl;

    public function mount()
    {
        $this->currentUrl = UrlFacade::current();


        $this->all_products = DB::table('products')->get();

        //        dd($this->stringurl);

        //        $this->urlparser();

    }

    public function urlparser()
    {
        $this->stringurl = parse_url($this->currentUrl, PHP_URL_QUERY);

        parse_str($this->stringurl, $this->queryarray);

        foreach ($this->queryarray as $key => $value) {

            //            dd($value);
            //            $this->category_filter[] = $value;

            //            array_push($this->category_filter, $value);
        }

        //        dd($this->queryarray);
    }

    public function render()
    {
        return view('livewire..shop.collection-filter');
    }


}

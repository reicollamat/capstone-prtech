<?php

namespace App\Orchid\Layouts\Product;

use App\Orchid\Filters\ProductCategoryFilter;
use App\Orchid\Filters\ProductStatusFilter;
use Orchid\Filters\Filter;
use Orchid\Screen\Layouts\Selection;

class ProductFiltersLayout extends Selection
{
    /**
     * @return Filter[]
     */
    public function filters(): iterable
    {
        return [
            ProductCategoryFilter::class,
            ProductStatusFilter::class,
        ];
    }
}

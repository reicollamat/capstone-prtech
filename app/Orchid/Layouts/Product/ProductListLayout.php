<?php

namespace App\Orchid\Layouts\Product;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class ProductListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'products';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('title', __('Product Name'))
                ->sort()
                ->cantHide(),
            TD::make('description', __('Description'))
                ->sort()
                ->cantHide(),
            TD::make('price', __('Price'))
                ->sort()
                ->cantHide(),
            TD::make('status', __('Status'))
                ->sort()
                ->cantHide(),
            TD::make('updated_at', __('Last Edit')),
        ];
    }
}

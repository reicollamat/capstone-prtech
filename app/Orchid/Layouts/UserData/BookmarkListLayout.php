<?php

namespace App\Orchid\Layouts\UserData;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class BookmarkListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'bookmarks';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('user_id', __('User ID'))
                ->sort()
                ->cantHide(),
            
            TD::make('product_id', __('Product ID'))
                ->sort()
                ->cantHide(),

            TD::make('title', __('Product Title'))
                ->sort()
                ->cantHide(),

            TD::make('category', __('Product Category'))
                ->sort()
                ->cantHide(),
        ];
    }
}

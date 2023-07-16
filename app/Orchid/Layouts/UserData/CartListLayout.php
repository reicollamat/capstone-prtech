<?php

namespace App\Orchid\Layouts\UserData;

use App\Models\CartItem;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class CartListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'cart_items';

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

            TD::make('title', __('User ID'))
                ->sort()
                ->cantHide(),
            
            TD::make('quantity', __('Quantity'))
                ->sort()
                ->cantHide(),

            TD::make('total_price', __('Total Price'))
                ->render(fn (CartItem $cart) => '₱'.number_format($cart->total_price, 2))
                ->sort()
                ->cantHide(),
        ];
    }
}

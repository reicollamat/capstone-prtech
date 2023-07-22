<?php

namespace App\Orchid\Layouts\UserData;

use App\Models\Product;
use App\Models\PurchaseItem;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class PurchaseItemsListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'purchase_items';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('purchase_id', __('Purchase ID'))
                ->sort()
                ->cantHide(),

            TD::make('product_id', __('Product'))
                ->sort()
                ->render(fn (PurchaseItem $purchase_item) => Product::find($purchase_item->product_id)->title),

            TD::make('quantity', __('Quantity'))
                ->sort()
                ->cantHide(),

            TD::make('total_price', __('Total Price'))
                ->render(fn (PurchaseItem $purchase_item) => '₱'.number_format($purchase_item->total_price, 2))
                ->sort()
                ->cantHide(),

        ];
    }
}

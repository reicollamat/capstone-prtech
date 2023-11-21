<?php

namespace App\Orchid\Layouts\UserData;

use App\Models\Purchase;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class PurchaseListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'purchases';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', __('Purchase ID'))
                ->sort()
                ->cantHide(),

            TD::make('user_id', __('User ID'))
                ->sort()
                ->cantHide(),

            TD::make('purchase_date', __('Purchase Date'))
                ->sort()
                ->render(fn (Purchase $purchase) => $purchase->purchase_date),

            TD::make('total_amount', __('Total Amount'))
                ->render(fn (Purchase $purchase) => '₱ '.number_format($purchase->total_amount, 2))
                ->sort()
                ->cantHide(),

            TD::make('purchase_status', __('Purchase Status'))
                ->sort()
                ->cantHide(),

            TD::make(__('Purchase Items'))
                ->align(TD::ALIGN_CENTER)
            // ->width('100px')
                ->render(fn (Purchase $purchase) => Link::make(__('View'))
                    ->route('platform.userdata.purchase.items', ['purchase' => $purchase->id, 'user' => $purchase->user_id])
                    ->icon('bs.eye')),

        ];
    }
}

<?php

namespace App\Orchid\Layouts\Product;

use App\Models\Product;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Illuminate\Support\Str;

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
                ->width('450')
                ->render(fn (Product $product) => Str::limit($product->description, 200))
                ->sort()
                ->cantHide(),

            TD::make('price', __('Price'))
                ->render(fn (Product $product) => '₱'.number_format($product->price, 2))
                ->sort()
                ->cantHide(),

            TD::make('status', __('Status'))
                ->sort()
                ->cantHide(),

            TD::make('updated_at', __('Last Edit'))
                ->sort()
                ->render(fn (Product $product) => $product->updated_at->toDateTimeString()),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Product $product) => DropDown::make()
                    ->icon('bs.three-dots-vertical')
                    ->list([
                        Link::make(__('Edit'))
                            ->route('platform.products.edit', $product->id)
                            ->icon('bs.pencil'),

                        Button::make(__('Delete'))
                            ->icon('bs.trash3')
                            ->confirm('Once the product is deleted, all of its resources and data will be permanently deleted.')
                            ->method('remove', [
                                'id' => $product->id,
                            ]),
                    ])),
        ];
    }
}

<?php

namespace App\Orchid\Filters;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Orchid\Filters\Filter;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Select;

class ProductStatusFilter extends Filter
{
    /**
     * The displayable name of the filter.
     */
    public function name(): string
    {
        return __('Status');
    }

    /**
     * The array of matched parameters.
     */
    public function parameters(): ?array
    {
        return ['product_status'];
    }

    /**
     * Apply to a given Eloquent query builder.
     */
    public function run(Builder $builder): Builder
    {
        return $builder->where('status', $this->request->get('product_status'));
    }

    /**
     * Get the display fields.
     *
     * @return Field[]
     */
    public function display(): iterable
    {
        return [
            Select::make('product_status')
                ->fromModel(Product::class, 'status', 'status')
                ->empty()
                ->value($this->request->get('product_status'))
                ->title(__('Status')),
        ];
    }
}

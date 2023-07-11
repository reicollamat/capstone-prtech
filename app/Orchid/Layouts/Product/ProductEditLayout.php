<?php

namespace App\Orchid\Layouts\Product;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\RadioButtons;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layouts\Rows;

class ProductEditLayout extends Rows
{
    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title;

    /**
     * Get the fields elements to be displayed.
     *
     * @return Field[]
     */
    protected function fields(): iterable
    {
        return [
            Input::make('product.title')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Title'))
                ->placeholder(__('Title')),

            // input product image

            Select::make('product.category')
                ->required()
                ->options([
                    '' => '',
                    'processor' => 'Processor(CPUs)',
                    'graphics_card' => 'Graphics Cards',
                    'motherboard' => 'Motherboards',
                    'ram' => 'RAM (Memory)',
                    'psu' => 'Power Supply Unit (PSU)',
                    'case' => 'Computer Case',
                    'cooling' => 'Cooling Solution',
                    'monitor' => 'Monitor',
                    'keyboard' => 'Keyboard',
                    'mouse' => 'Mouse',
                    'others' => 'Others',
                ])
                ->title(__('Category'))
                ->help('Choose product category'),

            TextArea::make('product.description')
                ->required()
                ->title(__('Description'))
                ->placeholder(__('Description')),
            
            Input::make('product.price')
                ->required()
                ->title(__('Price'))
                ->placeholder(__('Price'))
                ->mask([
                    'alias' => 'currency',
                    'prefix' => ' ',
                    'groupSeparator' => '',
                    'digitsOptional' => true,
                ]),

            RadioButtons::make('product.status')
                ->required()
                ->options([
                    'available' => 'Available',
                    'unavailable' => 'Unavailable',
                ])
                ->help('Availability status of the product')
                ->title(__('Status')),
        ];
    }
}

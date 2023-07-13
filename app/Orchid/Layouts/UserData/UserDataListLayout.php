<?php

namespace App\Orchid\Layouts\UserData;

use App\Models\User;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Persona;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class UserDataListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'users';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('name', __('Name'))
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(fn (User $user) => new Persona($user->presenter())),

            TD::make('email', __('Email'))
                ->sort()
                ->cantHide()
                ->filter(Input::make()),

            TD::make(__('Bookmarks'))
                ->align(TD::ALIGN_CENTER)
                // ->width('100px')
                ->render(fn (User $user) => 
                    Link::make(__('View'))
                        ->route('platform.userdata.bookmark', $user->id)
                        ->icon('bs.bookmark'),),

            TD::make(__('Shopping Cart'))
                ->align(TD::ALIGN_CENTER)
                // ->width('100px')
                ->render(fn (User $user) => 
                    Link::make(__('View'))
                        ->route('platform.systems.users.edit', $user->id)
                        ->icon('bs.cart'),),

            TD::make(__('Purchases'))
                ->align(TD::ALIGN_CENTER)
                // ->width('100px')
                ->render(fn (User $user) => 
                    Link::make(__('View'))
                        ->route('platform.systems.users.edit', $user->id)
                        ->icon('bs.bag'),),
        ];
    }
}

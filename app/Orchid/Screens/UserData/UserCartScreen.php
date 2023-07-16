<?php

namespace App\Orchid\Screens\UserData;

use App\Models\CartItem;
use App\Models\User;
use App\Orchid\Layouts\UserData\CartListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class UserCartScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(User $user): iterable
    {
        // load current user
        $user->load(['roles']);

        // get cart_items.product_id inner join products.id
        $cart = CartItem::where('user_id', $user->id)
            ->join('products', 'products.id', '=', 'cart_items.product_id')
            ->get();

        return [
            'cart_items' => $cart,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Shopping Cart Items';
    }

    public function permission(): ?iterable
    {
        return [
            'platform.systems.users',
        ];
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make(__('Back'))
                ->icon('bs.back')
                ->route('platform.userdata')
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            CartListLayout::class,
        ];
    }
}

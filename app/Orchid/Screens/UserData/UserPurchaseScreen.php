<?php

namespace App\Orchid\Screens\UserData;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\User;
use App\Orchid\Layouts\UserData\PurchaseListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class UserPurchaseScreen extends Screen
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
            
        // get bookmarks.product_id inner join products.id
        $purchase = Purchase::where('user_id', $user->id)
            ->get();

        // dd($purchase);

        return [
            'purchases' => $purchase,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Purchases';
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
            PurchaseListLayout::class,
        ];
    }
}

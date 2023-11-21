<?php

namespace App\Orchid\Screens\UserData;

use App\Models\Bookmark;
use App\Models\Product;
use App\Models\User;
use App\Orchid\Layouts\UserData\BookmarkListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class UserBookmarkScreen extends Screen
{
    /**
     * @var User
     */
    public $user;

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
        $bookmark = Bookmark::where('user_id', $user->id)
            ->join('products', 'products.id', '=', 'bookmarks.product_id')
            ->get();

        return [
            'bookmarks' => $bookmark,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Bookmarks';
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
                ->route('platform.userdata'),
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
            BookmarkListLayout::class,
        ];
    }
}

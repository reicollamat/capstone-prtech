<?php

namespace App\Orchid\Screens\UserData;

use App\Models\Bookmark;
use App\Models\Product;
use App\Models\User;
use App\Orchid\Layouts\UserData\BookmarkListLayout;
use Illuminate\Support\Facades\DB;
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
        $user->load(['roles']);

        // $bookmark = DB::table('products')
        //     ->join('bookmarks', 'products.id', '=', 'bookmarks.product_id')
        //     ->select('bookmarks.product_id', 'products.title')
        //     ->get();
            
        $bookmark = Bookmark::where('user_id', $user->id)
            ->join('products', 'products.id', '=', 'bookmarks.product_id')
            ->get();

        return [
            'bookmarks' => $bookmark,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Bookmarks';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
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

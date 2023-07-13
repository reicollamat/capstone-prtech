<?php

namespace App\Orchid\Screens\UserData;

use App\Models\User;
use App\Orchid\Layouts\User\UserFiltersLayout;
use App\Orchid\Layouts\UserData\UserDataListLayout;
use Orchid\Screen\Screen;

class UserDataScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'users' => User::where('permissions', 'like', '{"platform.index": "0", "platform.systems.roles": "0", "platform.systems.users": "0", "platform.systems.attachment": "0"}')
                ->filters(UserFiltersLayout::class)
                ->defaultSort('id', 'desc')
                ->paginate(),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'User Data';
    }

    /**
     * Display header description.
     */
    public function description(): ?string
    {
        return 'A comprehensive list of all registered users, including their bookmark, shopping cart and purchases data';
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
            UserDataListLayout::class,
        ];
    }
}

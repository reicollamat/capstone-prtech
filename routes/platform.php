<?php

declare(strict_types=1);

use App\Orchid\Screens\Examples\ExampleActionsScreen;
use App\Orchid\Screens\Examples\ExampleCardsScreen;
use App\Orchid\Screens\Examples\ExampleChartsScreen;
use App\Orchid\Screens\Examples\ExampleFieldsAdvancedScreen;
use App\Orchid\Screens\Examples\ExampleFieldsScreen;
use App\Orchid\Screens\Examples\ExampleLayoutsScreen;
use App\Orchid\Screens\Examples\ExampleScreen;
use App\Orchid\Screens\Examples\ExampleTextEditorsScreen;
use App\Orchid\Screens\OverviewScreen;
use App\Orchid\Screens\Product\ManageInventoryScreen;
use App\Orchid\Screens\Product\ProductEditScreen;
use App\Orchid\Screens\Product\ProductScreen;
use App\Orchid\Screens\Product\RecommenderScreen;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use App\Orchid\Screens\User\UserProfileScreen;
use App\Orchid\Screens\UserData\PurchaseItemsListScreen;
use App\Orchid\Screens\UserData\UserBookmarkScreen;
use App\Orchid\Screens\UserData\UserCartScreen;
use App\Orchid\Screens\UserData\UserDataScreen;
use App\Orchid\Screens\UserData\UserPurchaseScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the need "dashboard" middleware group. Now create something great!
|
*/

// Main
Route::screen('/main', OverviewScreen::class)
    ->name('platform.main');

// Platform > Profile
Route::screen('profile', UserProfileScreen::class)
    ->name('platform.profile')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Profile'), route('platform.profile')));

// Platform > System > Users > User
Route::screen('users/{user}/edit', UserEditScreen::class)
    ->name('platform.systems.users.edit')
    ->breadcrumbs(fn (Trail $trail, $user) => $trail
        ->parent('platform.systems.users')
        ->push($user->name, route('platform.systems.users.edit', $user)));

// Platform > System > Users > Create
Route::screen('users/create', UserEditScreen::class)
    ->name('platform.systems.users.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.users')
        ->push(__('Create'), route('platform.systems.users.create')));

// Platform > System > Users
Route::screen('users', UserListScreen::class)
    ->name('platform.systems.users')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Users'), route('platform.systems.users')));

// Platform > System > Roles > Role
Route::screen('roles/{role}/edit', RoleEditScreen::class)
    ->name('platform.systems.roles.edit')
    ->breadcrumbs(fn (Trail $trail, $role) => $trail
        ->parent('platform.systems.roles')
        ->push($role->name, route('platform.systems.roles.edit', $role)));

// Platform > System > Roles > Create
Route::screen('roles/create', RoleEditScreen::class)
    ->name('platform.systems.roles.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.roles')
        ->push(__('Create'), route('platform.systems.roles.create')));

// Platform > System > Roles
Route::screen('roles', RoleListScreen::class)
    ->name('platform.systems.roles')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Roles'), route('platform.systems.roles')));

// __________ SHOP __________

// Platform > System > Product > Edit
Route::screen('products/{product}/edit', ProductEditScreen::class)
    ->name('platform.products.edit')
    ->breadcrumbs(fn (Trail $trail, $product) => $trail
        ->parent('platform.products')
        ->push($product->title, route('platform.products.edit', $product)));

// Platform > System > Product > Create
Route::screen('products/create', ProductEditScreen::class)
    ->name('platform.products.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.products')
        ->push(__('Create Product'), route('platform.products.create')));

// Platform > System > Product > Create
Route::screen('products/inventory', ManageInventoryScreen::class)
    ->name('platform.products.inventory')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.products')
        ->push(__('Manage Inventory'), route('platform.products.inventory')));

// Platform > System > Product > Recommender
Route::screen('products/recommender', RecommenderScreen::class)
    ->name('platform.products.recommender')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.products')
        ->push(__('Product Recommender'), route('platform.products.recommender')));

// Platform > System > Product
Route::screen('products', ProductScreen::class)
    ->name('platform.products')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push('Products'));

// Platform > System > UserData > Bookmark
Route::screen('userdata/{user}/bookmark', UserBookmarkScreen::class)
    ->name('platform.userdata.bookmark')
    ->breadcrumbs(fn (Trail $trail, $user) => $trail
        ->parent('platform.index')
        ->push('User Data', route('platform.userdata'))
        ->push('Bookmarks', route('platform.userdata.bookmark', $user))
        ->push($user->name)
    );

// Platform > System > UserData > Cart
Route::screen('userdata/{user}/cart', UserCartScreen::class)
    ->name('platform.userdata.cart')
    ->breadcrumbs(fn (Trail $trail, $user) => $trail
        ->parent('platform.index')
        ->push('User Data', route('platform.userdata'))
        ->push('Shopping Cart', route('platform.userdata.cart', $user))
        ->push($user->name)
    );

// Platform > System > UserData > Purchase > PurchaseItem
Route::screen('userdata/purchase/items', PurchaseItemsListScreen::class)
    ->name('platform.userdata.purchase.items');
// ->breadcrumbs(fn (Trail $trail, $purchase) => $trail
//     ->parent('platform.userdata.purchase')
//     ->push($purchase->id, route('platform.userdata.purchase.items', $purchase)));

// Platform > System > UserData > Purchase
Route::screen('userdata/{user}/purchase', UserPurchaseScreen::class)
    ->name('platform.userdata.purchase');
// ->breadcrumbs(fn (Trail $trail, $user) => $trail
//     ->parent('platform.index')
//     ->push('User Data', route('platform.userdata'))
//     ->push('Purchases', route('platform.userdata.purchase', $user))
//     ->push($user->name)
//     );

// Platform > System > UserData
Route::screen('userdata', UserDataScreen::class)
    ->name('platform.userdata')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push('User Data'));

// Example...
Route::screen('example', ExampleScreen::class)
    ->name('platform.example')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push('Example Screen'));

Route::screen('/form/examples/fields', ExampleFieldsScreen::class)->name('platform.example.fields');
Route::screen('/form/examples/advanced', ExampleFieldsAdvancedScreen::class)->name('platform.example.advanced');
Route::screen('/form/examples/editors', ExampleTextEditorsScreen::class)->name('platform.example.editors');
Route::screen('/form/examples/actions', ExampleActionsScreen::class)->name('platform.example.actions');

Route::screen('/layout/examples/layouts', ExampleLayoutsScreen::class)->name('platform.example.layouts');
Route::screen('/charts/examples/charts', ExampleChartsScreen::class)->name('platform.example.charts');
Route::screen('/cards/examples/cards', ExampleCardsScreen::class)->name('platform.example.cards');

//Route::screen('idea', Idea::class, 'platform.screens.idea');

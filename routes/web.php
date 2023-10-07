<?php

use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseListController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


// get if user is_admin then redirect to designated view
Route::get('/redirect', [LandingController::class, 'redirect']);

// landing page / home page
Route::get('/', [LandingController::class, 'index'])->name('index_landing');

Route::get('/livewire-test', App\Livewire\Landing::class);

// shop page
Route::get('/shop', [ShopController::class, 'index'])->name('index_shop');
Route::get('/searchresult', [ShopController::class, 'search_result'])->name('search_result');
// product detail page
Route::get('/shop/{product_id}/{category}/details', [ShopController::class, 'product_detail'])->name('product_detail');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // logged in
    // cart page
    Route::get('/cart', [CartController::class, 'index'])->name('index_cart');
    // add to cart
    Route::post('/addtocart', [CartController::class, 'add_to_cart'])->name('add_to_cart');
    Route::post('/removecartitem', [CartController::class,'remove_cartitem'])->name('remove_cartitem');

    // bookmark page
    Route::get('/bookmark', [BookmarkController::class, 'index_bookmark'])->name('index_bookmark');
    // addremove bookmark
    Route::post('/addbookmark', [BookmarkController::class, 'add_bookmark'])->name('add_bookmark');
    Route::post('/removebookmark', [BookmarkController::class,'remove_bookmark'])->name('remove_bookmark');

    // purchase list page
    Route::get('/purchaselist', [PurchaseListController::class, 'purchase_list'])->name('purchase_list');


    // purchase page
    Route::get('/purchasepage', [UserController::class, 'purchase_page'])->name('purchase_page');
    Route::post('/purchaseone', [UserController::class, 'purchase_one'])->name('purchase_one');

    Route::get('/purchasecartpage', [UserController::class, 'purchasecart_page'])->name('purchasecart_page');
    Route::post('/purchasecart', [UserController::class, 'purchase_cart'])->name('purchase_cart');
});

require __DIR__ . '/auth.php';

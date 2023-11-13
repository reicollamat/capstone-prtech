<?php

use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseListController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Livewire\Landing;
use App\Livewire\Seller\Dashboard;
use App\Livewire\Seller\Inventory;
use App\Livewire\Seller\OnBoarding\Form\SellerRegistration;
use App\Livewire\Seller\OnBoarding\Form\ShopInformation;
use App\Livewire\Seller\OnBoarding\Form\ShopSuccess;
use Illuminate\Support\Facades\Route;

use \App\Livewire\Seller\Auth\LoginPage;

use \App\Livewire\Seller\Auth\RegisterPage;

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

Route::get('/collection', [\App\Livewire\Shop\Collections::class])->name('collection');

Route::get('/testing', Landing::class)->name('testing_page');

// there is where the seller route group and prefix with a seller name     // seller
Route::prefix('seller')->group(function () {

    // seller registration
    Route::get('register', RegisterPage::class)->name('seller-signup');
    Route::get('login', LoginPage::class)->name('seller-login');

    // seller registration
    Route::get('on-boarding', SellerRegistration::class)->name('seller-registration');
    Route::get('on-boarding/form', ShopInformation::class)->name('seller-shop-information');
    Route::get('on-boarding/form/{id}', ShopInformation::class)->name('seller-shop-information-user');
    Route::get('on-boarding/form/sucess', ShopSuccess::class)->name('seller-shop-information-success');

    // seller dashboard
    Route::get('/seller', [SellerController::class, 'dashboard'])->name('seller-dashboard');
    Route::get('/seller/inventory', [SellerController::class, 'inventory'])->name('seller-inventory');
});


// shop page
Route::get('/shop', [ShopController::class, 'index'])->name('index_shop');
Route::get('/searchresult', [ShopController::class, 'search_result'])->name('search_result');
// product detail page
Route::get('/shop/{product_id}/{category}/details', [ShopController::class, 'product_detail'])->name('product_detail');


//Route::get('/seller-register', [SellerController::class, 'index'])->name('seller_register');

// login-register test
//Route::get('/logintest', [Landing::class, 'login'])->name('login');
//Route::get('/registertest', [Landing::class, 'register'])->name('register');

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
    Route::post('/removecartitem', [CartController::class, 'remove_cartitem'])->name('remove_cartitem');

    // bookmark page
    Route::get('/bookmark', [BookmarkController::class, 'index_bookmark'])->name('index_bookmark');
    // addremove bookmark
    Route::post('/addbookmark', [BookmarkController::class, 'add_bookmark'])->name('add_bookmark');
    Route::post('/removebookmark', [BookmarkController::class, 'remove_bookmark'])->name('remove_bookmark');

    // purchase list page
    Route::get('/purchaselist', [PurchaseListController::class, 'purchase_list'])->name('purchase_list');


    // purchase page
    Route::get('/purchasepage', [UserController::class, 'purchase_page'])->name('purchase_page');
    Route::post('/purchaseone', [UserController::class, 'purchase_one'])->name('purchase_one');

    Route::get('/purchasecartpage', [UserController::class, 'purchasecart_page'])->name('purchasecart_page');
    Route::post('/purchasecart', [UserController::class, 'purchase_cart'])->name('purchase_cart');
});

// support page group
Route::prefix('support')->group(function () {
    Route::get('/contact-us', function () {
        return view('support.contactus');
    })->name('contact-us');
    Route::get('/shipping-return-policy', function () {
        return view('support.shippingandreturn');
    })->name('shipping-return-policy');
    Route::get('/warranty-information', function () {
        return view('support.warranty');
    })->name('warranty-information');
    Route::get('/track-order', function () {
        return view('support.trackorder');
    })->name('track-order');
    Route::get('/support-center', function () {
        return view('support.supportcenter');
    })->name('support-center');
});

// explore page group
Route::prefix('explore')->group(function () {
    Route::get('/about-us', function () {
        return view('explore.aboutus');
    })->name('about-us');
    Route::get('/help', function () {
        return view('explore.help');
    })->name('help');
    Route::get('/privacy-policy', function () {
        return view('explore.privacypolicy');
    })->name('privacy-policy');
    Route::get('/terms-and-conditions', function () {
        return view('explore.termsandcondition');
    })->name('terms-and-conditions');
});

require __DIR__ . '/auth.php';

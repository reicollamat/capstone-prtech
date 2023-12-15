<?php

use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseListController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WordCloudController;
use App\Http\Middleware\SellerAuthMiddleware;
use App\Http\Middleware\SellerMiddleware;
use App\Livewire\Gcash\Gcash1;
use App\Livewire\Gcash\Gcash2;
use App\Livewire\Gcash\Gcash3;
use App\Livewire\Landing;
use App\Livewire\LeaveReview;
use App\Livewire\Seller\Auth\LoginPage;
use App\Livewire\Seller\Auth\RegisterPage;
use App\Livewire\Seller\Dashboard\AnalyticsLinks\AnalyticsModelReport;
use App\Livewire\Seller\Dashboard\OrderLinks\OrderCancellations;
use App\Livewire\Seller\Dashboard\OrderLinks\OrderHistory;
use App\Livewire\Seller\Dashboard\OrderLinks\OrderList;
use App\Livewire\Seller\Dashboard\OrderLinks\OrderReturnsRefunds;
use App\Livewire\Seller\Dashboard\ProductLinks\ProductAdd;
use App\Livewire\Seller\Dashboard\ProductLinks\ProductList;
use App\Livewire\Seller\Dashboard\SellerLanding;
use App\Livewire\Seller\Dashboard\ShipmentLinks\ShipmentHistory;
use App\Livewire\Seller\Dashboard\ShipmentLinks\ShipmentList;
use App\Livewire\Seller\Dashboard\ShipmentLinks\ShipmentOptions;
use App\Livewire\Seller\Dashboard\ShopLinks\ShopManagement;
use App\Livewire\Seller\Dashboard\ShopLinks\ShopManagementCategory;
use App\Livewire\Seller\Dashboard\ShopLinks\ShopMetricSettings;
use App\Livewire\Seller\OnBoarding\Form\SellerRegistration;
use App\Livewire\Seller\OnBoarding\Form\ShopInformation;
use App\Livewire\Shop;
use App\Livewire\Shop\Collections;
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

Route::post('generate', [WordCloudController::class, 'generatePositiveWordCloud'])->name('generate_positive_word_cloud');

// get if user is_admin then redirect to designated view
Route::get('/redirect', [LandingController::class, 'redirect']);

// landing page / home page
Route::get('/', [LandingController::class, 'index'])->name('index_landing');

Route::get('/testing', Landing::class)->name('testing_page');

// there is where the seller route group and prefix with a seller name     // seller
Route::prefix('seller')->group(function () {

    // seller middleware
    Route::middleware(SellerAuthMiddleware::class)->group(function () {

        // user seller signup
        Route::get('register', RegisterPage::class)->name('seller-signup');

        // user seller login
        Route::get('login', LoginPage::class)->name('seller-login');
    });

    // this route is for handling the shop information of the user
    Route::get('on-boarding/form', ShopInformation::class)->name('seller-shop-information');

    //
    // Route::get('on-boarding', SellerRegistration::class)->name('seller-registration');
    // });

    // createed a middleware to handle if user is a seller or not
    Route::middleware([SellerMiddleware::class])->group(function () {
        // seller landing page
        Route::get('/', SellerLanding::class)->name('seller-landing');

        Route::prefix('app')->group(function () {

            // route groups of products tab with its child routes
            Route::prefix('product')->group(function () {
                Route::get('/list', ProductList::class)->name('product-list');
                Route::get('/new', ProductAdd::class)->name('product-new');
            });
            // route groups of order tab with its child routes
            Route::prefix('order')->group(function () {
                Route::get('/list', Orderlist::class)->name('order-list');
                Route::post('/list-update', [OrderList::class, 'update_status'])->name('order-list-update');
                Route::get('/history', OrderHistory::class)->name('order-history');
                Route::get('/cancellations', OrderCancellations::class)->name('order-cancellations');
                Route::get('/returns', OrderReturnsRefunds::class)->name('order-returns');
            });
            // route groups of shipment tab with its child routes
            Route::prefix('shipment')->group(function () {
                Route::get('/list', ShipmentList::class)->name('shipment-list');
                Route::get('/history', ShipmentHistory::class)->name('shipment-history');
                Route::get('/options', ShipmentOptions::class)->name('shipment-options');
            });
            // route groups of shop management tab with its child routes
            Route::prefix('shop')->group(function () {
                Route::get('/', Shopmanagement::class)->name('shop-management');
                Route::get('/manage/category', ShopManagementCategory::class)->name('shop-management-category');
                Route::get('/manage/metrics', ShopMetricSettings::class)->name('shop-management-metrics');
            });
            Route::prefix('analytics')->group(function () {
                Route::get('/stocksense', AnalyticsModelReport::class)->name('analytics-model-report');
            });
        });
    });
});

// shop page
// Route::get('/shop', [ShopController::class, 'index'])->name('index_shop');
Route::get('/collections', Collections::class)->name('index_shop'); // full collections

Route::get('/collections/{category}', Collections::class)->name('collections-category'); // category collections

Route::get('/collections/{product_id}/{category}/details', [ShopController::class, 'product_detail'])->name('collections-details');

Route::get('/searchresult', [ShopController::class, 'search_result'])->name('search_result');
// product detail page
Route::get('/shop/{product_id}/{category}/details', [ShopController::class, 'product_detail'])->name('product_detail');

Route::get('/leave_review', [LeaveReview::class, 'review_page'])->name('leave_review');

// Route::get('/seller-register', [SellerController::class, 'index'])->name('seller_register');

// login-register test
// Route::get('/logintest', [Landing::class, 'login'])->name('login');
// Route::get('/registertest', [Landing::class, 'register'])->name('register');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/profile/cancel_order', [ProfileController::class, 'request_cancel_order'])->name('profile.request_cancel_order');

    // UPDATE ITEM STATUS TO ARRIVE
    Route::patch('/order/arrived', [ProfileController::class, 'updateOrderStatus'])->name('status-order-update');

    // RETURN/REFUND
    Route::post('/profile/request_returnrefund', [ProfileController::class, 'request_returnrefund'])->name('profile.request_returnrefund');
    Route::post('/profile/confirm_returnrefund', [ProfileController::class, 'confirm_returnrefund'])->name('profile.confirm_returnrefund');
    Route::post('/profile/shipping_returnrefund', [ProfileController::class, 'shipping_returnrefund'])->name('profile.shipping_returnrefund');
    Route::post('/profile/replacement_arrived', [ProfileController::class, 'replacement_arrived'])->name('profile.replacement_arrived');
    Route::post('/profile/refundcompleted_returnrefund', [ProfileController::class, 'refundcompleted_returnrefund'])->name('profile.refundcompleted_returnrefund');
    Route::post('/profile/cancel_returnrefund_request', [ProfileController::class, 'cancel_returnrefund_request'])->name('profile.cancel_returnrefund_request');

    // logged in
    // // cart page
    // Route::get('/cart', [CartController::class, 'index'])->name('index_cart');
    // // add to cart
    // Route::post('/addtocart', [CartController::class, 'add_to_cart'])->name('add_to_cart');
    // Route::post('/removecartitem', [CartController::class, 'remove_cartitem'])->name('remove_cartitem');

    // // bookmark page
    // Route::get('/bookmark', [BookmarkController::class, 'index_bookmark'])->name('index_bookmark');
    // // addremove bookmark
    // Route::post('/addbookmark', [BookmarkController::class, 'add_bookmark'])->name('add_bookmark');
    // Route::post('/removebookmark', [BookmarkController::class, 'remove_bookmark'])->name('remove_bookmark');

    // // purchase list page
    // Route::get('/purchaselist', [PurchaseListController::class, 'purchase_list'])->name('purchase_list');

    // purchase page
    Route::get('/purchasepage', [UserController::class, 'purchase_page'])->name('purchase_page');
    Route::get('/payment1', Gcash1::class)->name('gcash1');
    Route::get('/payment2', Gcash2::class)->name('gcash2');
    Route::get('/payment3', Gcash3::class)->name('gcash3');

    Route::post('/purchaseone', [UserController::class, 'purchase_one'])->name('purchase_one');
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
    Route::get('/shipping-fee-table', function () {
        return view('support.shippingfee');
    })->name('shipping-fee-table');
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

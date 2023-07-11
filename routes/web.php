<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
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
// shop page
Route::get('/shop', [ShopController::class, 'index'])->name('index_shop');
// product detail page



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // logged in
    // cart page
    Route::get('/cart/{name}', [CartController::class, 'index'])->name('index_cart');
});

require __DIR__.'/auth.php';

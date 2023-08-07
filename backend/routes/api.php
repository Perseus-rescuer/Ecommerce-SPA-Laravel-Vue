<?php

use App\Http\Controllers\Api\Frontend\ContactController;
use App\Http\Controllers\Api\Frontend\HomeController;
use App\Http\Controllers\Api\Frontend\Layouts\FooterController;
use App\Http\Controllers\Api\Frontend\Layouts\HeaderController;
use App\Http\Controllers\Api\Frontend\Layouts\SettingsController;
use App\Http\Controllers\Api\Frontend\Layouts\SidebarController;
use App\Http\Controllers\Api\Frontend\NewArrivalController;
use App\Http\Controllers\Api\Frontend\ProductController;
use App\Http\Controllers\Api\Frontend\relatedProductController;
use App\Http\Controllers\Api\Frontend\SearchController;
use App\Http\Controllers\Api\Frontend\ShopController;
use App\Http\Controllers\Api\Frontend\TopRatingController;
use App\Http\Controllers\Api\Frontend\TopSaleController;
use App\Http\Controllers\Api\Frontend\Users\CartController;
use App\Http\Controllers\Api\Frontend\Users\CheckoutController;
use App\Http\Controllers\Api\Frontend\Users\OrderController;
use App\Http\Controllers\Api\Frontend\Users\OrderItemController;
use App\Http\Controllers\Api\Frontend\Users\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::name('api.')->group(function () {
    Route::get('home', HomeController::class)->name('home');
    Route::get('site-settings', SettingsController::class)->name('siteSettings');
    Route::get('sidebar', [SidebarController::class, 'index'])->name('sidebar');
    Route::get('search', SearchController::class)->name('search');
    Route::get('contacts', ContactController::class)->name('contacts');
    Route::get('shop', ShopController::class)->name('shop');
    Route::get('arrivals', NewArrivalController::class)->name('.arrivals');
    Route::get('ratings', TopRatingController::class)->name('.ratings');
    Route::get('sales', TopSaleController::class)->name('.sales');

    Route::prefix('products')->name('products')->group(function () {
        Route::get('{id}', ProductController::class)->where('id', '[0-9]+');
        Route::get('related/{subCateId}', relatedProductController::class)->name('.related')->where('id', '[0-9]+');
    });

    Route::prefix('users')->name('users')->group(function () {
        Route::get('cart', CartController::class)->name('.cart');
        Route::post('checkout', [CheckoutController::class, 'createCheckout'])->name('.checkout');

        Route::prefix('orders')->name('.orders')->group(function () {
            Route::get('{id}', [OrderController::class, 'showOrdersQuery'])->where('id', '[0-9]+');
            Route::get('{id}/items', [OrderItemController::class, 'index'])->name('.items')->where('id', '[0-9]+');
        });

        Route::prefix('profiles')->name('.profiles')->group(function () {
            Route::get('{id}', [ProfileController::class, 'index'])->where('id', '[0-9]+');
            Route::put('{id}', [ProfileController::class, 'update'])->name('.update')->where('id', '[0-9]+');
            Route::post('create', [ProfileController::class, 'create'])->name('.create');
        });
    });
});

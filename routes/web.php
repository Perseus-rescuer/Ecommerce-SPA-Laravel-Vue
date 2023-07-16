<?php

use App\Http\Livewire\Categories\CategoriesController;
use App\Http\Livewire\Categories\CategoriesCreateController;
use App\Http\Livewire\Categories\CategoriesUpdateController;
use App\Http\Livewire\Categories\SectionsController;
use App\Http\Livewire\Categories\SectionsCreateController;
use App\Http\Livewire\Categories\SectionsUpdateController;
use App\Http\Livewire\Categories\SubCategoriesController;
use App\Http\Livewire\Categories\SubCategoriesCreateController;
use App\Http\Livewire\Categories\SubCategoriesUpdateController;
use App\Http\Livewire\Contacts\ContactsController;
use App\Http\Livewire\Contacts\ContactsReplayController;
use App\Http\Livewire\DashboardController;
use App\Http\Livewire\Editors\EditorsController;
use App\Http\Livewire\Editors\EditorsCreateController;
use App\Http\Livewire\Editors\EditorsUpdateController;
use App\Http\Livewire\Orders\OrdersController;
use App\Http\Livewire\Orders\OrdersPdfController;
use App\Http\Livewire\Orders\OrdersUpdateController;
use App\Http\Livewire\Products\AttributesController;
use App\Http\Livewire\Products\AttributesCreateController;
use App\Http\Livewire\Products\AttributesUpdateController;
use App\Http\Livewire\Products\BrandsController;
use App\Http\Livewire\Products\BrandsCreateController;
use App\Http\Livewire\Products\BrandsUpdateController;
use App\Http\Livewire\Products\ProductsController;
use App\Http\Livewire\Products\ProductsCreateController;
use App\Http\Livewire\Products\ProductsShowController;
use App\Http\Livewire\Products\ProductsUpdateController;
use App\Http\Livewire\Products\TagsController;
use App\Http\Livewire\Products\TagsCreateController;
use App\Http\Livewire\Products\TagsUpdateController;
use App\Http\Livewire\Reports\BrandedProductsReportController;
use App\Http\Livewire\Reports\CategorizedProductsReportController;
use App\Http\Livewire\Reports\CouponsReportController;
use App\Http\Livewire\Reports\CustomersOrderReportController;
use App\Http\Livewire\Reports\ProductsPurchaseReportController;
use App\Http\Livewire\Reports\ProductsStockReportController;
use App\Http\Livewire\Reports\ProductsViewReportController;
use App\Http\Livewire\Reports\SalesReportController;
use App\Http\Livewire\Reports\SearchReportController;
use App\Http\Livewire\Reports\ShippingReportController;
use App\Http\Livewire\Reports\TaggedProductsReportController;
use App\Http\Livewire\SettingsController;
use App\Http\Livewire\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', DashboardController::class)->name('home');

Route::get('/sign-in', function () {
    return view('guestPages.signIn');
})->name('signIn');

Route::get('/sign-up', function () {
    return view('guestPages.signUp');
})->name('signUp');

Route::get('/recovery-password', function () {
    return view('guestPages.recoveryPassword');
})->name('recoveryPassword');

Route::get('/forget-password', function () {
    return view('guestPages.forgetPassword');
})->name('forgetPassword');

Route::prefix('products')->name('products')->group(function () {
    Route::get('/', ProductsController::class);

    Route::get('/create', ProductsCreateController::class)->name('.create');

    Route::get('/{id}', ProductsShowController::class)->name('.show');

    Route::get('/{id}/edit', ProductsUpdateController::class)->name('.update');
});

Route::prefix('brands')->name('brands')->group(function () {
    Route::get('/', BrandsController::class);

    Route::get('/create', BrandsCreateController::class)->name('.create');

    Route::get('/{id}/edit', BrandsUpdateController::class)->name('.update');
});

Route::prefix('tags')->name('tags')->group(function () {
    Route::get('/', TagsController::class);

    Route::get('/create', TagsCreateController::class)->name('.create');

    Route::get('/{id}/edit', TagsUpdateController::class)->name('.update');
});

Route::prefix('attributes')->name('attributes')->group(function () {
    Route::get('/', AttributesController::class);

    Route::get('/create', AttributesCreateController::class)->name('.create');

    Route::get('/{id}/edit', AttributesUpdateController::class)->name('.update');
});

Route::prefix('sections')->name('sections')->group(function () {
    Route::get('/', SectionsController::class);

    Route::get('/create', SectionsCreateController::class)->name('.create');

    Route::get('/{id}/edit', SectionsUpdateController::class)->name('.update');
});

Route::prefix('categories')->name('categories')->group(function () {
    Route::get('/', CategoriesController::class);

    Route::get('/create', CategoriesCreateController::class)->name('.create');

    Route::get('/{id}/edit', CategoriesUpdateController::class)->name('.update');
});

Route::prefix('sub-categories')->name('subCategories')->group(function () {
    Route::get('/', SubCategoriesController::class);

    Route::get('/create', SubCategoriesCreateController::class)->name('.create');

    Route::get('/{id}/edit', SubCategoriesUpdateController::class)->name('.update');
});

Route::prefix('editors')->name('editors')->group(function () {
    Route::get('/', EditorsController::class);

    Route::get('/create', EditorsCreateController::class)->name('.create');

    Route::get('/{id}/edit', EditorsUpdateController::class)->name('.update');
});

Route::prefix('orders')->name('orders')->group(function () {
    Route::get('/', OrdersController::class);

    Route::get('/{id}/edit', OrdersUpdateController::class)->name('.update');

    Route::get('/{id}/pdf', OrdersPdfController::class)->name('.pdf');
});

Route::prefix('reports')->name('reports')->group(function () {
    Route::get('/brand-products', BrandedProductsReportController::class)->name('.brand.products');
    Route::get('/categorized-products', CategorizedProductsReportController::class)->name('.categorized.products');
    Route::get('/coupons', CouponsReportController::class)->name('.coupons');
    Route::get('/customers-order', CustomersOrderReportController::class)->name('.customers.order');
    Route::get('/products-purchase', ProductsPurchaseReportController::class)->name('.products.purchase');
    Route::get('/products-stock', ProductsStockReportController::class)->name('.products.stock');
    Route::get('/products-view', ProductsViewReportController::class)->name('.products.view');
    Route::get('/sales', SalesReportController::class)->name('.sales');
    Route::get('/search', SearchReportController::class)->name('.search');
    Route::get('/shipping', ShippingReportController::class)->name('.shipping');
    Route::get('/tagged-products', TaggedProductsReportController::class)->name('.tagged.products');
});

Route::prefix('contacts')->name('contacts')->group(function () {
    Route::get('/', ContactsController::class);
    Route::get('/{id}/reply', ContactsReplayController::class)->name('contacts.reply');
});

Route::prefix('settings')->name('settings')->group(function () {
    Route::get('/general', SettingsController::class)->name('.general');
    Route::get('/coupons', ContactsReplayController::class)->name('.coupons');
    Route::get('/mail', ContactsReplayController::class)->name('.mail');
    Route::get('/offers', ContactsReplayController::class)->name('.offers');
    Route::get('/shipping-method', ContactsReplayController::class)->name('.shippingMethod');
});

Route::get('/users', UsersController::class)->name('users');

Route::get('/404', function () {
    return view('errors.404');
})->name('404');

Route::get('/500', function () {
    return view('errors.500');
})->name('500');

Route::get('/invoice', function () {
    return view('adminPages.invoice');
})->name('invoice');

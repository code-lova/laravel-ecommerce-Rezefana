<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');







Route::controller(App\Http\Controllers\Frontend\FrontendController::class)->group(function () {
    Route::get('/', 'Frontend')->name('homePage');
    Route::get('/collections/products/{subcategory_slug}', 'viewSubcatProduct')->name('sub.cat');
    Route::get('/collection/products/{endcategory_slug}', 'viewEndcatProduct');
    Route::get('/collections/{category_slug}/{product_slug}', 'ViewProduct')->name('view.item');

    //Route for search
    Route::get('/collection/search', 'SearchPage');

    //Review and ratings
    Route::post('app/collection/store-review', 'StoreReview');

    //Cart route here
    Route::post('/app/collection/store-cart', 'StoreCart');

    //View products in cart
    Route::get('/app/collections/view-cart', 'ViewCartProducts')->name('cart');

    //Delete item in cart
    Route::delete('/app/collection/delete-item/{id}', 'destroyItem');

    //Delete item in wishlist
    Route::delete('/app/collection/delete-wishitem/{item_id}', 'deleteWishlistItem');

    //Update Cart Quantity
    Route::post('app/collections/update-item', 'UpdateQuantity');

    //Add to Wishlist
    Route::post('app/collections/add-to-wishlist', 'AddItemtoWishlist');

    //View products in wishlists
    Route::get('/app/collections/wishlist', 'Wishlistpage');

    //Checkout Page route
    Route::get('app/checkout', 'CheckoutPage')->name('checkout.item');

    //Place Order to order table
    Route::post('app/place-order', 'PlaceOrder');

    //Bank success page
    Route::get('/app/collections/success', 'SuccessPage')->name('pay.success_page');


    //callback URL after paystack payment success page
    Route::get('app/collections/pay/callback/{reference}', 'PaymentCallback')->name('pay.callback');

});

Route::prefix('user')->middleware(['auth'])->group(function () {
    Route::controller(App\Http\Controllers\User\UserController::class)->group(function () {
        Route::get('/profile', 'UserAccount')->name('user.profile');
        Route::post('/update_account/{user_id}', 'UpdateProfile');
        Route::put('/update-password/{user_id}', 'UpdatePassword');

        //Order Table
        Route::get('/fetch-details/{product_id}', 'FetchOrderDetails');

    });
});







//Routes for Admin

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'Dashboard']);

    //Product Category controller
    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {

        // Main Category
        Route::get('/category', 'index');
        Route::post('/add-category', 'StoreCategory');
        Route::put('/edit-category/{id}', 'EditCategory');
        Route::delete('/delete-category/{id}', 'destroyCat');

        // Sub category
        Route::get('/sub-category', 'subCategory');
        Route::post('/add-subcategory', 'StoreSubcategory');
        Route::get('/edit-subcat/{id}', 'EditSubCategory');
        Route::put('/update-subcategory/{id}', 'UpdateSubCategory');
        Route::delete('/delete-subcategory/{id}', 'destroySubCat');

        // End Category
        Route::get('/end-category', 'EndCategory');
        Route::post('/add-endcategory', 'StoreEndcategory');
        Route::get('/edit-endcat/{id}', 'EditEndCategory');
        Route::put('/update-endcategory/{id}', 'UpdateEndCategory');
        Route::delete('/delete-endcategory/{id}', 'destroyEndCat');

    }) ;


    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function (){
        Route::get('/market/products', 'index');
        Route::get('/create-product', 'CreateProduct');
        Route::post('market/products', 'StoreProducts');
        Route::get('/market/products/{product}/edit', 'EditProduct');
        Route::post('api/fetch-subcategory', 'fetchSubcategory');
        Route::post('api/fetch-endcategory', 'fetchEndcategory');
        Route::put('market/products/{product}', 'UpdateProduct');
        Route::get('/market/product/{product_id}/delete', 'DestroyProduct');
        Route::get('/product_image/{product_image_id}/delete', 'DestroyProductImage');
        Route::get('/delete_psize/{product_size_id}', 'DestroyProductSize');
        Route::get('/delete_pcolor/{product_color_id}', 'DestroyProductColor');

    });


     Route::controller(\App\Http\Controllers\Admin\UserController::class)->group(function (){
        Route::get('customers', 'CustomersPage');
        Route::get('/edit-user/{id}', 'EditUser');
        Route::post('/update-user/{id}', 'UserUpdate');
        Route::get('/block-user/{id}', 'BlockUser');
        Route::get('/unblock-user/{id}', 'UnBlockUser');
        Route::post('/destroy-user/{id}', 'destroyUser');
    });


    Route::controller(\App\Http\Controllers\Admin\CommentReviwsController::class)->group(function (){
        Route::get('reviews', 'ReviewPage');
        Route::get('/view-comment/{id}', 'FetchComment');
        Route::get('/delete-review/{review_id}', 'DestroyReview');
    });


    Route::controller(\App\Http\Controllers\Admin\WishlistController::class)->group(function (){
        Route::get('wishlist', 'wishListPage');
        Route::get('/delete-wishlist/{wishlist_id}', 'DestroyWishlist');

    });




    //Brand liverwire controller
    //Route::get('/brands', App\Http\Livewire\Admin\Brand\index::class);

    //Colors liverwire controller
    Route::get('colors', App\Http\Livewire\Admin\Colors\Index::class);

    //Sizes Livewire Controller
    Route::get('sizes', App\Http\Livewire\Admin\Sizes\Index::class);

    //Currency Controller
    Route::controller(App\Http\Controllers\Admin\CurrencyController::class)->group(function () {
        Route::get('/currency', 'index');
        Route::get('/activate-currency/{id}', 'activateCurrency');
    });

    Route::controller(App\Http\Controllers\Admin\ShippingCostController::class)->group(function () {
        Route::get('/shipping-cost', 'index');
        Route::post('/add-shippingcost', 'StoreShippingCost');
        Route::put('/edit-shippingcost/{shipping_id}','UpdateShippingCost');

        Route::delete('/delete-shippingcost/{id}', 'destroyShippingCost');

        //Shipping cost all fuction below
        Route::get('/shipping-cost-all', 'ShippingCostAll');
        Route::post('/shipping-cost-all', 'storeShipcostAll');
    });

    Route::controller(App\Http\Controllers\Admin\ProductOrders::class)->group(function (){
        Route::get('products-orders', 'index');
        Route::get('/carts', 'cartPage');
    });


    Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function () {
        Route::get('/top-slider-settings', 'TopsliderSettings');
        Route::post('/store-slider', 'StoreTopSlider');
    });


    Route::controller(App\Http\Controllers\Admin\BannerController::class)->group(function (){
        Route::get('banner-settings', 'index');
        Route::post('/store-banner', 'StoreBanner');
    });

    Route::controller(App\Http\Controllers\Admin\AdsImageController::class)->group(function (){
        Route::get('ads-settings', 'index');
        Route::post('/store-ads', 'StoreAdverts');
    });


    Route::controller(App\Http\Controllers\Admin\LogofavController::class)->group(function () {
        Route::get('/logo-favicon', 'index');
        Route::post('store-logofav', 'StoreLogofav');
    });

    Route::controller(App\Http\Controllers\Admin\PaymentMethodController::class)->group(function () {
        Route::get('/payment-method', 'index');
        Route::post('/add-paymentmethod', 'StorePaymentMethod');
        Route::delete('/delete-payemntmehod/{payment_id}', 'DestroyPayment');
        Route::put('/edit-payment/{payment_id}','UpdatePayment');
    });

    Route::controller(App\Http\Controllers\Admin\SettingsController::class)->group(function () {
        Route::get('/site-setting', 'index');
        Route::post('/store_site_setting', 'StoreSiteSettings');

        //On and Off settings
        Route::get('/on-ff-setting', 'SwitcherSettings');
        //Other settings
        Route::get('/other-settings', 'OtherSettings');
        Route::post('/cta', 'StoreCalltoaction');

    });

    Route::controller(App\Http\Controllers\Admin\SwitcherController::class)->group(function () {
        Route::get('/on-ff-setting', 'SwitcherSettings');
        Route::post('/ads', 'switchAds');
        Route::post('/sponsor', 'SponsorSett');
        Route::post('/subscriber', 'SubscriberSett');
    });

    Route::controller(App\Http\Controllers\Admin\WebController::class)->group(function (){
        Route::get('/about-us', 'AboutusPage');
        Route::post('/store-about', 'StoreAbout');
        //contact us page
        Route::get('/contact_us', 'CreateContactUs');
        Route::post('/store-contact', 'StoreContact');
        //FaQ
        Route::get('/faq', 'FaqPage');
        Route::post('/store-faq', 'StoreFAQ');
        Route::get('/fetch-faq/{id}', 'FetchFaq');
        Route::post('/update-faq/{id}', 'UpdateFaq');
        Route::delete('/delete-faq/{id}', 'DestroyFaq');


    });





});

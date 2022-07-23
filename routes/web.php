<?php

use App\Exports\LeadExport;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryGalleryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductGalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('logout', [LoginController::class, 'logout']);

Route::get('/show', function () {
    $instagram = new \InstagramScraper\Instagram(new \GuzzleHttp\Client());
    $nonPrivateAccountMedias = $instagram->getMedias('kevin');
    var_dump($nonPrivateAccountMedias);
    echo $nonPrivateAccountMedias[0]->getLink();
});
Route::get('/campaign/{campaign}', [AdminController::class, 'showCampaign'])->name('showCampaign');

Route::group(['prefix' => 'bc-admin', 'middleware' => 'auth'], function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    //Product Routes
    Route::get('/products', [AdminController::class, 'products'])->name('products');
    Route::get('/products/add', [AdminController::class, 'addProduct'])->name('addProduct');
    Route::get('/products/{product}', [AdminController::class, 'editProduct'])->name('editProduct');
    Route::put('/products/{product}', [AdminController::class, 'updateProduct'])->name('updateProduct');
    Route::delete('/products/{product}', [AdminController::class, 'deleteProduct'])->name('deleteProduct');
    Route::post('/products', [AdminController::class, 'storeProduct'])->name('storeProduct');
    //Product Routes
    Route::group(['prefix' => 'category'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin-category');
        Route::get('/add', [CategoryController::class, 'add'])->name('admin-add-category');
        Route::get('/{category}', [CategoryController::class, 'edit'])->name('admin-edit-category');
        Route::put('/{category}', [CategoryController::class, 'update'])->name('admin-update-category');
        Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('admin-destroy-category');
        Route::post('/', [CategoryController::class, 'store'])->name('admin-store-category');
    });
    // Orders
    Route::group(['prefix' => 'order'], function () {
        Route::get('/', [OrderController::class, 'indexAdmin'])->name('admin-order');
        Route::get('preview/{order}', [OrderController::class, 'preview'])->name('admin-preview');
        Route::get('/add', [OrderController::class, 'add'])->name('admin-add-order');
        Route::get('/{order}', [OrderController::class, 'edit'])->name('admin-edit-order');
        Route::put('/{order}', [OrderController::class, 'update'])->name('admin-update-order');
        Route::delete('/{order}', [OrderController::class, 'destroy'])->name('admin-destroy-order');
        Route::post('/', [OrderController::class, 'store'])->name('admin-store-order');
    });
    // Settings
    Route::group(['prefix' => 'setting'], function () {
        Route::get('/', [SettingController::class, 'indexAdmin'])->name('admin-setting');
        Route::get('/add', [SettingController::class, 'add'])->name('admin-add-setting');
        Route::get('/{setting}', [SettingController::class, 'edit'])->name('admin-edit-setting');
        Route::put('/{setting}', [SettingController::class, 'update'])->name('admin-update-setting');
        Route::delete('/{setting}', [SettingController::class, 'destroy'])->name('admin-destroy-setting');
        Route::post('/', [SettingController::class, 'store'])->name('admin-store-setting');
    });
    // Slides
    Route::group(['prefix' => 'slide'], function () {
        Route::get('/', [SlideController::class, 'indexAdmin'])->name('admin-slide');
        Route::get('/add', [SlideController::class, 'add'])->name('admin-add-slide');
        Route::get('/{slide}', [SlideController::class, 'edit'])->name('admin-edit-slide');
        Route::put('/{slide}', [SlideController::class, 'update'])->name('admin-update-slide');
        Route::delete('/{slide}', [SlideController::class, 'destroy'])->name('admin-destroy-slide');
        Route::post('/', [SlideController::class, 'store'])->name('admin-store-slide');
    });
    // Contact
    Route::group(['prefix' => 'contact'], function () {
        Route::get('/', [ContactController::class, 'indexAdmin'])->name('admin-contact');
        Route::get('export', [ContactController::class, 'export']);
    });
    // Contact
    Route::group(['prefix' => 'lead'], function () {
        Route::get('/', [LeadController::class, 'indexAdmin'])->name('admin-lead');
        Route::get('export', [LeadController::class, 'export']);
    });
    //Campaign Routes
    Route::get('/campaigns', [AdminController::class, 'campaigns'])->name('campaigns');
    Route::get('/campaigns/add', [AdminController::class, 'addCampaign'])->name('addCampaign');
    Route::get('/campaigns/{campaign}', [AdminController::class, 'editCampaign'])->name('editCampaign');
    Route::put('/campaigns/{campaign}', [AdminController::class, 'updateCampaign'])->name('updateCampaign');
    Route::delete('/campaigns/{campaign}', [AdminController::class, 'deleteCampaign'])->name('deleteCampaign');
    Route::post('/campaigns', [AdminController::class, 'storeCampaign'])->name('storeCampaign');
});

Route::group(['prefix' => 'profile'], function () {
    Route::get('/', [ProfileController::class, 'profile']);
    Route::get('/details', [ProfileController::class, 'details'])->name('details');
    Route::get('/ipoints', [ProfileController::class, 'ipoints'])->name('ipoints');
    // Route::get('/wishlist', [ProfileController::class, 'wishlist'])->name('wishlist');
    Route::get('/payment', [ProfileController::class, 'payment'])->name('payment');
    Route::get('/settings', [ProfileController::class, 'settings'])->name('settings');
    Route::get('/shipping-address', [ProfileController::class, 'shippingAddress'])->name('shipping-address');
    Route::put('/settings/user/{user}', [UserController::class, 'updatePassword'])->name('updatePassword');
    Route::put('/details/user/{user}', [UserController::class, 'updateImage'])->name('updateImage');
    Route::patch('/details/user/{user}', [UserController::class, 'update'])->name('update');
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
    Route::post('/add-to-wishlist', [WishlistController::class, 'store'])->name('addToWishlist');
    Route::delete('/wishlist/{id}', [WishlistController::class, 'destroy'])->name('destroy');
});

// Route::resource('/wishlist', WishlistController::class, ['except' => ['create', 'edit', 'show', 'update']]);

// Start Cart
Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::post('add-to-cart/category/{id}', [CartController::class, 'addToCartCategory'])->name('addToCartCategory');
Route::get('cart/total', [CartController::class, 'total'])->name('cart-total');
Route::put('cart/category/update-cart', [CartController::class, 'updateCategoryCartCount'])->name('update.cart');
Route::delete('cart/category/remove-from-cart', [CartController::class, 'removeCategoryCart'])->name('remove.from.category.cart');
// End Cart

Route::post('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('addToCart');
Route::put('update-cart', [ProductController::class, 'updateCartCount'])->name('update.cart');
Route::delete('remove-from-cart', [ProductController::class, 'remove'])->name('remove.from.cart');
// Start Checkout
Route::group(['prefix' => '/checkout'], function () {
    Route::get('/', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/', [CheckoutController::class, 'store']);
    Route::get('/success', [CheckoutController::class, 'successPayment']);
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/our-history', [HomeController::class, 'ourHistory'])->name('ourhistory');
Route::group(['prefix' => 'contact'], function () {
    Route::get('/', [ContactController::class, 'index'])->name('contact');
    Route::post('/', [ContactController::class, 'store'])->name('contact');
});
Route::group(['prefix' => 'lead'], function () {
    Route::get('/', [LeadController::class, 'index'])->name('contact');
    Route::post('/', [LeadController::class, 'store'])->name('contact');
});
Route::get('/', [HomeController::class, 'index']);
Route::get('/informatique', [ProductController::class, 'informatiqueProducts']);
Route::get('/cosmetic', [ProductController::class, 'cosmeticProducts']);

Route::post('/address', [UserController::class, 'storeShipping'])->name('shipping');
Route::post('/user', [UserController::class, 'store'])->name('storeUser');

//PayPal Routes
Route::get('create-transaction', [\App\Http\Controllers\PaypalPaymentController::class, 'createTransaction'])->name('createTransaction');
Route::get('process-transaction', [\App\Http\Controllers\PaypalPaymentController::class, 'processTransaction'])->name('processTransaction');
Route::get('success-transaction', [\App\Http\Controllers\PaypalPaymentController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [\App\Http\Controllers\PaypalPaymentController::class, 'cancelTransaction'])->name('cancelTransaction');

// Route::get('handle-payment', [\App\Http\Controllers\PaypalPaymentController::class,'handlePayment'])->name('make.payment');
// Route::get('cancel-payment',[\App\Http\Controllers\PaypalPaymentController::class,'paymentCancel'])->name('cancel.payment');
// Route::get('payment-success',[\App\Http\Controllers\PaypalPaymentController::class,'paymentSuccess'])->name('success.payment');
// Route::get('test-payment',[\App\Http\Controllers\PaypalPaymentController::class,'index'] );
Route::group(['prefix' => 'product'], function () {
    Route::resource('/', ProductController::class);
    Route::get('/{product}', [ProductController::class, 'show']);
});
Route::group(['prefix' => 'product-gallery'], function () {
//    Route::resource('/', ProductGalleryController::class,['names' => 'productGallery']);
    Route::delete('/{product}', [ProductGalleryController::class, 'destroy'])->name('productGallery.destroy');
});
Route::group(['prefix' => 'category'], function () {
    Route::resource('/', CategoryController::class);
    Route::get('/{category}', [CategoryController::class, 'show']);
});
Route::group(['prefix' => 'category-gallery'], function () {
//    Route::resource('/', ProductGalleryController::class,['names' => 'categoryGallery']);
    Route::delete('/{category}', [CategoryGalleryController::class, 'destroy'])->name('categoryGallery.destroy');
});

Route::group(['prefix' => 'city'], function () {
    Route::resource('/', CityController::class);
});
Route::get('lang/home', [LangController::class, 'index']);
Route::get('lang/change', [LangController::class, 'change'])->name('changeLang');

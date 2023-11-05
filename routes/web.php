<?php

use App\Http\Livewire\AboutComponent;
use App\Http\Livewire\Admin\AdminContactComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ProductDetailComponent;
use App\Http\Livewire\ProductAndVendorDetailComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\ShopSearchComponent;
use App\Http\Livewire\ShopListViewComponent;
use App\Http\Livewire\ShopGridViewComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\WishListComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\CompareComponent;
use App\Http\Livewire\VendorComponent;
use App\Http\Livewire\VendorListComponent;
use App\Http\Livewire\VendorStoresComponent;
use App\Http\Livewire\DealsComponent;
use App\Http\Livewire\CategoryComponent;


use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminViewInActiveProductListComponent;
use App\Http\Livewire\Admin\AdminViewProductListComponent;
use App\Http\Livewire\Admin\AdminViewVendorComponent;
use App\Http\Livewire\Admin\AdminViewCategoryComponent;
use App\Http\Livewire\Admin\AdminViewOrderComponent;
use App\Http\Livewire\Admin\AdminViewPendingOrderComponent;
use App\Http\Livewire\Admin\AdminOrderDetailComponent;
use App\Http\Livewire\Admin\AdminProfileComponent;
use App\Http\Livewire\Admin\AdminViewActiveProductComponent;
use App\Http\Livewire\Admin\Homepagesetting\AdminAddHomePageSliderComponent;
use App\Http\Livewire\Admin\Category\AdminCategoryComponent;
use App\Http\Livewire\Admin\Category\EditCategoryComponent;
use App\Http\Livewire\Admin\Whole\Sale\WholeSaleComponent;
use App\Http\Livewire\Admin\Whole\Sale\EditWholeSaleComponent;
use App\Http\Livewire\Admin\ChangePasswordComponent;
use App\Http\Livewire\Admin\Coupon\AdminAddCouponComponent;
use App\Http\Livewire\Admin\Coupon\AdminCouponComponent;
use App\Http\Livewire\Admin\Coupon\AdminEditCouponComponent;
use App\Http\Livewire\Admin\Coupon\AdminSaleOnComponent;
//AdminAddHomeSliderComponent;
use App\Http\Livewire\Admin\Homepagesetting\AdminHomePageSettingcomponent;
use App\Http\Livewire\Admin\Homepagesetting\AdminHomeCategoryComponent;
use App\Http\Livewire\Admin\Homepagesetting\AdminHomeSliderComponent;
use App\Http\Livewire\Admin\Homepagesetting\AdminHomeSliderEditComponent;
use App\Http\Livewire\Admin\Vendor\VendorComponent as VendorVendorComponent;
use App\Http\Livewire\Admin\Vendor\VendorDetailComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\TermsConditionComponent;
use App\Http\Livewire\Vendor\VendorDashboardComponent;
use App\Http\Livewire\Vendor\VendorProfileComponent;
use App\Http\Livewire\Vendor\VendorStoreComponent;
use App\Http\Livewire\Vendor\VendorAddProductComponent;
use App\Http\Livewire\Vendor\VendorEditProductComponent;
use App\Http\Livewire\Vendor\VendorProductComponent;
use App\Http\Livewire\Vendor\VendorOrderComponent;
use App\Http\Livewire\Vendor\VendorDetailOrderComponent;
use App\Http\Livewire\Vendor\VendorWalletComponent;

use App\Http\Livewire\User\MyDashboardComponent;
use App\Http\Livewire\User\MyOrderDeailComponent;
use App\Http\Livewire\User\MyOrdersComponent;
use App\Http\Livewire\User\MyReviewsComponent;
use App\Http\Livewire\User\TrackOrderComponent;

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
Route::get('/',HomeComponent::class)->name('home');
Route::get('/product/{id}',ProductDetailComponent::class)->name('product-detail');
Route::get('/product/vendor/{id}',ProductAndVendorDetailComponent::class)->name('product-vendor-detail');
Route::get('/shop',ShopComponent::class)->name('shop');
Route::get('/deals',DealsComponent::class)->name('deals');
Route::get('/cart',CartComponent::class)->name('product.cart');;
Route::get('/checkout',CheckoutComponent::class)->name('checkout');
Route::get('/wishlist',WishListComponent::class)->name('wishlist');
Route::get('/thankyou',ThankyouComponent::class)->name('thankyou');
Route::get('/list',ShopListViewComponent::class)->name('list');
Route::get('/grid',ShopGridViewComponent::class)->name('grid');
Route::get('/compare',CompareComponent::class)->name('compare');
Route::get('/vendors',VendorComponent::class)->name('vendors');
Route::get('/vendors-list',VendorListComponent::class)->name('vendors-list');
Route::get('/category/{id}',CategoryComponent::class)->name('category');
Route::get('/shop/search',ShopSearchComponent::class)->name('search');
Route::get('/vendors/store/{id}',VendorStoresComponent::class)->name('vendors-stores');
Route::get('/contact',ContactComponent::class)->name('contact');
Route::get('/about',AboutComponent::class)->name('about');
Route::get('/terms-services',TermsConditionComponent::class)->name('terms-services');

Route::middleware(['auth:sanctum', 'verified','admin'])->group( function () {
    Route::prefix('admin')->group(function(){
        Route::get('/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
        Route::get('/all/products',AdminViewProductListComponent::class)->name('admin.view-product-list');
        Route::get('/all/in-active/products',AdminViewInActiveProductListComponent::class)->name('admin.view-in-active-products');
        Route::get('/all/active/products',AdminViewActiveProductComponent::class)->name('admin.view-all-active-products');
        Route::get('/all/vendors',AdminViewVendorComponent::class)->name('admin.view-vendors');
        Route::get('/all/categories',AdminViewCategoryComponent::class)->name('admin.view-categories');
        Route::get('/all/view/orders',AdminViewOrderComponent::class)->name('admin.view_all_orders');
        Route::get('/order/detail/{id}',AdminOrderDetailComponent::class)->name('admin.order-detail');
        Route::get('/view/all/pending/orders',AdminViewPendingOrderComponent::class)->name('admin.view-pensing-orders');
        Route::get('/home/page/setting',AdminHomePageSettingcomponent::class)->name('admin.home-page-setting');
        Route::get('/home/page/category/setting',AdminHomeCategoryComponent::class)->name('admin.home-page-category');
        Route::get('/home/banners/',AdminHomeSliderComponent::class)->name('admin.home-sliders');
        Route::get('/home/banner/edit/{slider_id}',AdminHomeSliderEditComponent::class)->name('admin.edit-banner');
        Route::get('/home/add/page/banners',AdminAddHomePageSliderComponent::class)->name('admin.add-home-slider');
        Route::get('/add/new/category',AdminCategoryComponent::class)->name('admin.categories');
        Route::get('/add/coupon',AdminAddCouponComponent::class)->name('admin.add-coupon');
        Route::get('/all/coupons',AdminCouponComponent::class)->name('admin.coupons');
        Route::get('/edit/{id}',AdminEditCouponComponent::class)->name('admin.edit-coupon');
        Route::get('/sale-on',AdminSaleOnComponent::class)->name('admin.sale');
        Route::get('/contact/messages',AdminContactComponent::class)->name('admin.contact-messages');
        Route::get('/vendors',VendorVendorComponent::class)->name('admin.vendors');
        Route::get('/view/vendor/{id}',VendorDetailComponent::class)->name('admin.vendor');
        Route::get('/profile',AdminProfileComponent::class)->name('admin.profile');
        Route::get('/change/password',ChangePasswordComponent::class)->name('admin.changepassword');
        Route::get('edit/category/{id}',EditCategoryComponent::class)->name('admin.edit_category');
        Route::get('/whole/sales',WholeSaleComponent::class)->name('admin.wholesale');
        Route::get('/edit/whole/sale/{id}',EditWholeSaleComponent::class)->name('admin.edit_wholesale');

    });
});
Route::middleware(['auth:sanctum', 'verified','vendor'])->group( function () {
    Route::prefix('vendor')->group(function(){
        Route::get('/dashboard',VendorDashboardComponent::class)->name('vendor.dashboard');
        Route::get('/wallet',VendorWalletComponent::class)->name('vendor.wallet');
        Route::get('/profile',VendorProfileComponent::class)->name('vendor.profile');
        Route::get('/store',VendorStoreComponent::class)->name('vendor.store');
        Route::get('/products',VendorProductComponent::class)->name('vendor.products');
        Route::get('/add/product',VendorAddProductComponent::class)->name('vendor.addproduct');
        Route::get('/edit/product/{id}',VendorEditProductComponent::class)->name('vendor.editproduct');
        Route::get('/orders',VendorOrderComponent::class)->name('vendor.order');
        Route::get('/order/detail/{id}',VendorDetailOrderComponent::class)->name('vendor.order-detail');
    });
});
Route::middleware(['auth:sanctum', 'verified'])->group( function () {
    Route::prefix('my')->group(function(){
        Route::get('/dashboard',MyDashboardComponent::class)->name('my.dashboard');
        Route::get('/orders',MyOrdersComponent::class)->name('my.orders');
        Route::get('/order/{order_id}',MyOrderDeailComponent::class)->name('my.order-detail');
        Route::get('/add/reviews/{order_item_id}',MyReviewsComponent::class)->name('my.reviews');
        Route::get('/track/order',TrackOrderComponent::class)->name('track-order');

    });
});


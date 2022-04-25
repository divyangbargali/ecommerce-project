<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminLoginPageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\ReturnOrderController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home;


use vendor\Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

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
// Route::get('/userlogout',[HomeController::class, 'userlogout']);
// Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

//Email-Verify
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// HomeController

Route::get('/',[HomeController::class, 'home']);

Route::get('/first',[HomeController::class, 'first']);

Route::get('/about/us/',[HomeController::class, 'AboutUs']);
Route::get('/contact/us/',[HomeController::class, 'ContactUs']);
Route::post('/search/product/',[HomeController::class,'Search']);


Route::post('/userlogout',[\Laravel\Fortify\Http\Controllers\AuthenticatedSessionController::class, 'destroy']);






Route::get('/admin/login/',[AdminLoginPageController::class, 'AdminLogin']);

Route::post('/admin/login/',[AdminController::class,'store']);

Route::get('/admin/dashboard/',[AdminDashboardController::class, 'AdminDashboard']);
Route::post('/logout',[AdminDashboardController::class, 'logout']);


//Category
Route::get('/category',[CategoryController::class, 'category']);
Route::post('/insert/category',[CategoryController::class,'InsertCategory']);
Route::get('/edit/category/{id}',[CategoryController::class,'EditCategory']);
Route::post('/category/update/{id}',[CategoryController::class,'UpdateCategory']);
Route::get('/category/delete/{id}',[CategoryController::class,'CategoryDelete']);

//Subcategory
Route::get('/subcategory',[SubcategoryController::class,'SubCategory']);
Route::post('/insert/subcategory',[SubcategoryController::class,'InsertSubcategory']);
Route::get('/edit/subcategory/{id}',[SubcategoryController::class,'SubcategoryEdit']);
Route::post('/subcategory/update/{id}',[SubcategoryController::class,'SubcategoryUpdate']);
Route::get('/delete/subcategory/{id}',[SubcategoryController::class,'DeleteSubcategory']);

//Brand
Route::get('/brand',[BrandController::class,'Brand']);
Route::post('/insert/brand',[BrandController::class,'InsertBrand']);
Route::get('/edit/brand/{id}',[BrandController::class,'EditBrand']);
Route::post('/brand/update/{id}',[BrandController::class,'BrandUpdate']);

//Admin ProductController
Route::get('/add/product/',[ProductController::class,'AddProduct']);
Route::get('/all/product/',[ProductController::class,'AllProduct']);
Route::post('/insert/product/',[ProductController::class,'InsertProduct']);
Route::get('/get/subcategory/{id}',[ProductController::class,'GetSubcategory']);
Route::get('/view/product/{id}',[ProductController::class,'ViewProduct']);
Route::get('/edit/product/{id}',[ProductController::class,'EditProduct']);
Route::post('/update/product/{id}',[ProductController::class,'UpdateProduct']);
Route::post('/update/product/image/{id}',[ProductController::class,'UpdateProductImage']);
Route::get('/delete/product/{id}',[ProductController::class,'DeleteProduct']);
Route::get('shipping/price/',[ProductController::class,'ShippingPrice']);
Route::post('add/ship/price',[ProductController::class,'AddShipPrice']);

Route::get('edit/shipping/price/',[ProductController::class,'EditShipPrice']);

Route::post('update/ship/price/',[ProductController::class,'UpdateShipPrice']);

//Discount
Route::get('/discount/code/',[DiscountController::class,'DiscountCode']);
Route::post('/insert/discount/',[DiscountController::class,'InsertDiscount']);
Route::get('/edit/coupon/code/{id}',[DiscountController::class,'EditDiscount']);
Route::post('/coupon/update/{id}',[DiscountController::class,'UpdateDiscount']);
Route::get('/delete/coupon/code/{id}',[DiscountController::class,'DeleteDiscount']);
Route::get('/apply/discount/',[DiscountController::class,'ApplyDiscount']);
Route::get('/remove/coupon/code/',[DiscountController::class,'RemoveCoupon']);

//Profile
Route::get('/profile',[Home\ProfileController::class,'Profile']);
Route::get('/view/order/status/{id}',[Home\ProfileController::class,'ViewOrderStatus']);
Route::get('/return/order/',[Home\ProfileController::class,'ReturnOrder']);
Route::post('/order/return/request/',[Home\ProfileController::class,'OrderReturnRequest']);




//home (ProductController)
Route::get('/show/product/{id}',[Home\ProductController::class,'ShowProduct']);
Route::get('/download/now/',[Home\ProductController::class,'DownloadNow']);
Route::get('/login/home',[Home\LoginController::class,'Login'])->name('login1');



Route::get('/download',function(){
        $file = public_path()."/beyond-stammering.pdf";

        $header = array(
            'Content-Type:application/pdf',
        );

        return Response::download($file,"beyond-stammering.pdf",$header);
});

Route::post('/insert/cart/{id}',[Home\ProductController::class,'InsertCart']);
Route::post('/wishlist/insert/cart/{id}',[Home\ProductController::class,'WishlistInsertCart']);
Route::get('/cart/content/',[Home\ProductController::class,'CartContent']);
Route::post('/update/cart/quantity/',[Home\ProductController::class,'UpdateCart']);
Route::get('/delete/cart/item/{id}',[Home\ProductController::class,'DeleteCartItem']);
Route::get('/remove/all/cartitem/',[Home\ProductController::class,'RemoveCartItem']);
Route::get('/checkout',[Home\CheckoutController::class,'Checkout']);


//Payment
Route::post('/submit',[Home\Paymentcontroller::class,'submit']);
Route::get('/instamojo_redirect',[Home\PaymentController::class,'instamojo_redirect']);

//OrderController
Route::get('/new/order/',[OrderController::class,'NewOrder']);
Route::get('/view/order/{id}',[OrderController::class,'ViewOrder']);
Route::get('/accept/order/{id}',[OrderController::class,'AcceptOrder']);
Route::get('/cancel/order/{id}',[OrderController::class,'CancelOrder']);
Route::get('/accept/payment/',[OrderController::class,'AcceptPayment']);
Route::get('/process/delivery/{id}',[OrderController::class,'ProcessDelivery']);
Route::get('/cancel/orders/',[OrderController::class,'OrderCancel']);
Route::get('/process/delivery/',[OrderController::class,'ProcessDelivered']);
Route::get('/delivery/done/{id}',[OrderController::class,'DeliveryDone']);
Route::get('/delivery/success/',[OrderController::class,'DeliverySuccess']);


//Return Order
Route::get('return/request/',[ReturnOrderController::class,'ReturnRequest']);
Route::post('view/return/order/',[ReturnOrderController::class,'ViewReturnOrder']);
Route::post('accept/return/order/',[ReturnOrderController::class,'AcceptReturnOrder']);
Route::get('all/request/',[ReturnOrderController::class,'AllRequest']);

//Category Controller (Home)
Route::get('/category/page/{id}',[Home\CategoryController::class,'CategoryPage']);

//Wishlist Controller
Route::get('/add/wishlist/{id}',[Home\WishlistController::class,'Wishlist']);
Route::get('/wishlist',[Home\WishlistController::class,'WishlistItem']);

//Admin Report Controller
Route::get('today/order/',[ReportController::class,'TodayOrder']);
Route::get('today/deliver/',[ReportController::class,'TodayDeliver']);
Route::get('this/month/',[ReportController::class,'ThisMonth']);
Route::get('search/report/',[ReportController::class,'SearchReport']);
Route::get('/today/order/details/{id}',[ReportController::class,'TodayOrderDetails']);
Route::get('/today/delivery/details/{id}',[ReportController::class,'TodayDeliveryDetails']);
Route::get('/monthly/order/details/{id}',[ReportController::class,'MonthlyOrderDetails']);
Route::post('/search/by/date/',[ReportController::class,'SearchByDate']);
Route::post('/search/by/month/',[ReportController::class,'SearchByMonth']);
Route::get('/show/orders/by/date/{id}',[ReportController::class,'ShowOrdersByDate']);
Route::get('/show/orders/by/month/{id}',[ReportController::class,'ShowOrdersByMonth']);
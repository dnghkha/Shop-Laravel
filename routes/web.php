<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CustomerController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\OrderController as AdminOrderController;
use App\Http\Controllers\admin\PageController as AdminPageController;
use App\Http\Controllers\admin\ProductController as AdminProductController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\SupplierController;
use App\Http\Controllers\web\BlogController;
use App\Http\Controllers\web\CartController;
use App\Http\Controllers\web\LangController;
use App\Http\Controllers\web\OrderController;
use App\Http\Controllers\web\PageController;
use App\Http\Controllers\web\ProductController;
use App\Http\Middleware\CheckLang;
use App\Models\Role;
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


//Route ADMIN
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'checkadminlogin'], function () {

    //Home
    Route::get('/home', [AdminPageController::class, 'index'])->name('home');

    //Order
    Route::resource('order', AdminOrderController::class);

    //Customer
    Route::resource('customer', CustomerController::class);

    //Product
    Route::resource('product', AdminProductController::class)->middleware('checkroleadmin');

    //Category
    Route::resource('category', CategoryController::class);

    //Supplier
    Route::resource('supplier', SupplierController::class);

    //User
    Route::resource('user', UserController::class)->middleware('checkroleadmin');

    //Role
    Route::resource('role', RoleController::class);
});

//Login
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//Access denied
Route::get('/deny', [AdminPageController::class, 'deny'])->name('deny');


//===========================================================================================================


//Route WEB

Route::group(['middleware' => 'checklang'], function (){
    //Page
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about-us', [PageController::class, 'about_us'])->name('aboutus');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

//Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/detail', [BlogController::class, 'detail'])->name('blog.detail');


//Product
Route::resource('product', ProductController::class);

//Cart-Checkout
Route::resource('cart', CartController::class);
Route::get('/checkout', [OrderController::class, 'index'])->name('checkout');
Route::post('/checkout-store', [OrderController::class, 'store'])->name('checkout_store');
Route::get('/thankyou', [OrderController::class, 'thankyou'])->name('thankyou');
});

//Lang
Route::get('/lang/{lang}', [LangController::class, 'switchLang'])->name('lang');

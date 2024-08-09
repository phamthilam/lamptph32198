<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\ShopController;
use App\Http\Controllers\admin\SizeController;
use App\Http\Controllers\admin\ColorController;
use App\Http\Controllers\client\CartController;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\AboutController;
use App\Http\Controllers\client\LoginController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\client\ContactController;
use App\Http\Controllers\client\OrderController;
use App\Http\Controllers\client\ProductsController;
use App\Http\Controllers\client\RegisterController;

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

Route::get('/', function () {
    $products=Product::query()->latest('id')->limit(10)->get();
    return view('client.shop',compact('products'));
})->name('showShop');
Route::get('showhome',[HomeController::class,'showHome'])->name('showHome');
Route::get('about',[AboutController::class,'showAbout'])->name('showAbout');
Route::get('contact',[ContactController::class,'showContact'])->name('showContact');
Route::get('login',[HomeController::class,'showLogin'])->name('showLogin');
Route::post('login',[LoginController::class,'login']);
Route::get('register',[RegisterController::class,'showRegister'])->name('showRegister');
Route::post('register',[RegisterController::class,'register']);
Route::get('logout',[LoginController::class,'logout'])->name('logout');
Route::get('showforgotpassword',[LoginController::class,'showforgotpassword'])->name('showforgotpassword');
Route::post('showforgotpassword',[LoginController::class,'sendMail']);

Route::get('product/{id}', [ProductsController::class, 'detailPro'])->name('detailPro');
Route::post('dashboard', [ProductsController::class, 'searchProduct'])
->name('searchProduct');
//mua hàng
Route::get('listcart', [CartController::class, 'list'])->name('list');
Route::post('addcart', [CartController::class, 'add'])->name('add');
Route::get('checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('order', [OrderController::class, 'save'])->name('save');


Route::group(['prefix'=>'admin', 'as'=>'admin.'], function(){
    Route::group([
        'prefix'=>'products',
        'as'=>'products.',
        'middleware'=>'checkAdmin'
    ], function (){
        Route::get('/', [ProductController::class, 'listProducts'])
        ->name('listProducts');
        Route::get('addpro', [ProductController::class, 'addProduct'])
        ->name('addProduct');
        Route::post('addPostProduct', [ProductController::class, 'addPostProduct'])
        ->name('addPostProduct');
        Route::get('editpro/{id}', [ProductController::class, 'editProduct'])
        ->name('editProduct');
        Route::put('updatepro/{id}', [ProductController::class, 'upadteProduct'])
        ->name('upadteProducts');
        Route::get('deletepro/{id}', [ProductController::class, 'deleteProduct'])
        ->name('deleteProduct');
    });
    Route::group([
        'prefix'=>'category',
        'as'=>'category.',
        'middleware'=>'checkAdmin'
    ], function (){
        Route::get('/', [CategoryController::class, 'listCategory'])
        ->name('listCategory');
        Route::get('addcate', [CategoryController::class, 'addCategory'])
        ->name('addCategory');
        Route::post('addcate', [CategoryController::class, 'addPostCategory'])
        ->name('addPostCategory');
        Route::get('editcate/{id}', [CategoryController::class, 'editCategory'])
        ->name('editCategory');
        Route::put('updatecate/{id}', [CategoryController::class, 'editPostCategory'])
        ->name('editPostCategory');
        Route::get('deleteCate/{id}', [CategoryController::class, 'deleteCate'])
        ->name('deleteCate');
    });
    Route::group([
        'prefix'=>'user',
        'as'=>'user.',
        'middleware'=>'checkAdmin'
    ], function (){
        Route::get('/', [UserController::class, 'listUser'])
        ->name('listUser');
        Route::get('adduser', [UserController::class, 'addUser'])
        ->name('addUser');
        Route::post('adduser', [UserController::class, 'addPostUser'])
        ->name('addPostUser');
        Route::get('edituser/{id}', [UserController::class, 'editUser'])
        ->name('editUser');
        Route::put('edituser/{id}', [UserController::class, 'editPostUser'])
        ->name('editPostUser');
        Route::get('deleteuser/{id}', [UserController::class, 'deleteUser'])
        ->name('deleteUser');
    });
    Route::group([
        'prefix'=>'blog',
        'as'=>'blog.',
        'middleware'=>'checkAdmin'
    ], function (){
        Route::get('/', [BlogController::class, 'addBlog'])
        ->name('addBlog');
        Route::post('addBlog', [BlogController::class, 'addPostBlog'])
        ->name('addPostBlog');
    });
});


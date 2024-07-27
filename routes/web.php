<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\ShopController;
use App\Http\Controllers\admin\SizeController;
use App\Http\Controllers\admin\ColorController;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\AboutController;
use App\Http\Controllers\client\LoginController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\client\ContactController;
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
    return view('client.home');
});
Route::get('showhome',[HomeController::class,'showHome'])->name('showHome');
Route::get('shop',[ShopController::class,'showShop'])->name('showShop');
Route::get('about',[AboutController::class,'showAbout'])->name('showAbout');
Route::get('contact',[ContactController::class,'showContact'])->name('showContact');
Route::get('login',[HomeController::class,'showLogin'])->name('showLogin');
Route::post('login',[LoginController::class,'login']);
Route::get('register',[RegisterController::class,'showRegister'])->name('showRegister');
Route::post('register',[RegisterController::class,'register']);
Route::get('logout',[LoginController::class,'logout'])->name('logout');
Route::get('showforgotpassword',[LoginController::class,'showforgotpassword'])->name('showforgotpassword');
Route::post('showforgotpassword',[LoginController::class,'sendMail']);

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
        Route::get('editpro', [ProductController::class, 'editProduct'])
        ->name('editProduct');
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
        Route::get('editcate', [CategoryController::class, 'editCategory'])
        ->name('editCategory');
    });
    Route::group([
        'prefix'=>'size',
        'as'=>'size.',
        'middleware'=>'checkAdmin'
    ], function (){
        Route::get('/', [SizeController::class, 'listSize'])
        ->name('listSize');
        Route::get('addsize', [SizeController::class, 'addSize'])
        ->name('addSize');
        Route::get('editsize', [SizeController::class, 'editSize'])
        ->name('editSize');
    });
    Route::group([
        'prefix'=>'color',
        'as'=>'color.',
         'middleware'=>'checkAdmin'
        
    ], function (){
        Route::get('/', [ColorController::class, 'listColor'])
        ->name('listColor');
        Route::get('addcolor', [ColorController::class, 'addColor'])
        ->name('addColor');
        Route::get('editcolor', [ColorController::class, 'editColor'])
        ->name('editColor');
    });
});

<?php

use App\Http\Controllers\categoryController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\dashboardController;
use \App\Http\Controllers\userDashboardController;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\ContactUsController;
use \App\Http\Controllers\AccountsController;
use \App\Http\Controllers\checkoutController;
use \App\Http\Controllers\cartController;
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

//userDashboard route
Route::get('/' , [userDashboardController::class , 'index'])->name('dashboard');
Route::get('/hoodies' , [userDashboardController::class , 'viewHoodies']);
Route::get('/pants' , [userDashboardController::class , 'viewPants']);


//cart
Route::get('add-to-cart/{id}' , [cartController::class , 'addToCart'])->name('add_to_cart');
Route::get('cart' , [cartController::class , 'cart'])->name('cart');
Route::delete('/cart/delete/{id}', [cartController::class , 'delete'])->name('cart.delete');


//contact_us
Route::post('/contact-us', [ContactUsController::class, 'sendEmail'])->name('contact.send');

Route::middleware('guest')->group(function () {
    //login
    Route::get('/login' , [AuthController::class , 'loginForm']);
    Route::post('/login' , [AuthController::class , 'login']);

    //logout
    Route::get('/register' , [AuthController::class , 'registerForm']);
    Route::post('/register' , [AuthController::class , 'register']);

});

Route::middleware('auth')->group(function(){
    Route::post('/logout' , [AuthController::class , 'logout']);

});

Route::middleware('admins')->group(function() {
    //catergoy
    Route::get('/admin/categories' , [categoryController::class , 'index'])->name('categoreis');
    Route::get('/admin/categories/create' , [categoryController::class , 'create']);
    Route::post('/admin/categories' , [categoryController::class , 'store']);
    Route::get('/admin/categories/{catergoy}' , [categoryController::class , 'show']);
    Route::delete('/admin/categories/{catergoy}' , [categoryController::class , 'destory']);

    //customers
    Route::get('/admin/customers' , [AccountsController::class , 'customerIndex']);
    Route::get('/admin/customers/{customers}' , [AccountsController::class , 'showCustomer']);

    Route::middleware('super')->group(function (){
        //account
        Route::get('/admin/accounts' , [AccountsController::class , 'index']);
        Route::get('/admin/accounts/create' , [AccountsController::class , 'create']);
        Route::post('/admin/accounts' , [AccountsController::class , 'register'])->name('account_register');
        Route::get('/admin/accounts/{account}' , [AccountsController::class , 'show']);
    });
    
    //product
    Route::get('/admin/products' , [ProductController::class , 'index']);
    Route::get('/admin/products/create' , [ProductController::class , 'create']);
    Route::post('/admin/products' , [ProductController::class , 'store']);
    Route::get('/admin/products/{product}' , [ProductController::class , 'show']);
    Route::delete('/admin/products/{product}' , [ProductController::class , 'destory']);   
});


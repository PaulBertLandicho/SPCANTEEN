<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\SendsPasswordResetEmails;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RevenueChartController;
use App\Http\Controllers\OrderHistoryController;



//   Main Page 

Route::get('/', function () {
    return view('welcome');
});


// Authenticate

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/userdashboard', [UserController::class, 'dashboardindex'])->name('userdashboard')->middleware('auth');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/forgotpassword', function () {
    return view('auth.forgotpassword');
})->name('forgotpassword');

Route::post('/forgotpassword', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');


// User Profile 

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

Route::post('/update-status', [ProfileController::class, 'updateStatus'])->name('update.status');

Route::post('/save-profile-picture', [ProfileController::class, 'saveProfilePicture'])->name('save.profile.picture');

Route::get('/userprofile', function () {
    return view('user.userprofile');
});

Route::post('/userprofile', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/edit_profile', function () {
    return view('user.edit_profile');
});

Route::get('/dashboard', [UserController::class, 'dashboardindex'])->name('dashboardindex');

Route::get('/orderhistory', [OrderHistoryController::class, 'index'])->name('user.orderhistory');


//  Admin 

Route::get('/orderscanner', function () {
    return view('admin.orderscanner');
});

Route::get('/productedit', function () {
    return view('admin.productedit');
});

Route::match(['get', 'post'], '/adminorderlist', 'App\Http\Controllers\OrderController@process')->name('order.process');


Route::get('/users', 'App\Http\Controllers\UserController@index')->name('users.index');

Route::resource('users', UserController::class);
Route::put('/users/{user}', 'App\Http\Controllers\UserController@update')->name('users.update');


Route::get('/users/{user}/edit', 'App\Http\Controllers\UserController@edit')->name('users.edit');
Route::delete('/users/{user}', 'App\Http\Controllers\UserController@destroy')->name('users.destroy');


Route::get('/admindashboard', [LoginController::class, 'admindashboard'])->name('admindashboard');


Route::get('/addproductlist', [ProductController::class, 'index'])->name('admin.addproductlist');
Route::get('/addproduct', [ProductController::class, 'create'])->name('admin.addproduct');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');


Route::delete('/addproductlist/{product}', 'App\Http\Controllers\ProductController@destroy')->name('product.destroy');

    
Route::resource('products', ProductController::class);
Route::put('/products/{product}', 'App\Http\Controllers\ProductController@update')->name('products.update');


Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.productedit');


//  Super Admin

Route::get('/superadmindashboard', [LoginController::class, 'superadmindashboard'])->name('superadmindashboard');
Route::get('/manage_users', 'App\Http\Controllers\UserController@index');


//  Category

Route::get('/category1', [CategoryController::class, 'categoryindex'])->name('categoryindex');

Route::get('/category2', [CategoryController::class, 'category2index'])->name('category2index');

Route::get('/category3', [CategoryController::class, 'category3index'])->name('category3index');

   
//  Cart

Route::get('/cart/add/{product_id}', [CartController::class, 'add'])->name('cart.add');

Route::get('/cartlist', [CartController::class, 'showCart'])->name('user.cartlist');

Route::delete('/cartlist/{cart}', 'App\Http\Controllers\CartController@destroy')->name('cart.destroy');

Route::post('/update-quantity', 'App\Http\Controllers\CartController@updateQuantity')->name('cart.update.quantity');


//  Order


Route::get('order', [OrderController::class, 'list'])->name('user.order');

Route::delete('/cartlist/{cart}', 'App\Http\Controllers\CartController@destroy')->name('cart.destroy');

Route::delete('/order/{order}', 'App\Http\Controllers\OrderController@destroy')->name('order.destroy');


//  Payment

Route::get('/payment', function () {
    return view('user.payment');
});

Route::post('/payment', [OrderController::class, 'place'])->name('order.place');

Route::post('/process-payment', 'App\Http\Controllers\PaymentController@processPayment')->name('process.payment');
Route::get('/user.myqrcode', [QRCodeController::class, 'qrcode'])->name('user.myqrcode');

Route::get('myqrcode', 'App\Http\Controllers\QRCodeController@qrcode');


Route::get('/gcashpay', [OrderController::class, 'payment'])->name('gcashpay.process');

Route::get('/cashonhand', [OrderController::class, 'onhandpayment'])->name('cashonhand.process');

Route::get('/payschoolfee', [OrderController::class, 'schoolpayment'])->name('payschoolfee.process');


//  Total Revenue Chart

Route::get('/admindashboard', [RevenueChartController::class, 'index'])->name('admin.admindashboard');



<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\AuthOtpController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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
Route::get('/',function(){
return view('auth.login');
});





Auth::routes();
// Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::group(['middleware' => ['auth']], function() {
//     Route::resource('roles',RoleController::class);
//     Route::resource('users','UserController');

//     });

Route::resource('invoices', InvoicesController::class);

Route::get('/section/{id}',[InvoicesController::class,'getproducts']);

Route::resource('sections',SectionsController::class);

Route::resource('products',ProductsController::class);
Route::get('products/products_details',[ProductsController::class,'show']);

Route::resource('users',UserController::class);




Route::get('/forget pass',[ForgotPasswordController::class,'forget'])->name('forget.pass');
Route::post('/forget pass',[ForgotPasswordController::class,'forgetpass'])->name('forget.pass.post');
Route::get('/reset pass/{token}',[ForgotPasswordController::class,'reset'])->name('reset.pass');
Route::post('/reset pass',[ForgotPasswordController::class,'resetpass'])->name('reset.pass.post');


Route::get('/profile',[ProfileController::class,'show'])->name('profile');
Route::post('/profile',[ProfileController::class,'updateProfile'])->name('profilepost');


Route::get('/auth/google',[SocialiteController::class,'redirecttogoogle']);
Route::get('/auth/google/callback',[SocialiteController::class,'handlegooglecallback']);


    Route::get('/otp/login',[AuthOtpController::class ,'login'])->name('otp.login');
    Route::post('/otp/generate',[AuthOtpController::class ,'generate'])->name('otp.generate');
    Route::get('/otp/verification/{user_id}',[AuthOtpController::class,'verification'] )->name('otp.verification');
    Route::post('/otp/login',[AuthOtpController::class,'loginWithOtp'])->name('otp.getlogin');



Route::get('/{page}',[AdminController::class,'index']);



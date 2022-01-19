<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Auth\RegisterController;

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

Auth::routes();
Route::get('/', [HomeController::class,'index'])->name("main");
Route::get('/register', [RegisterController::class,'showRegister'])->name("register.show");
Route::post('/register', [RegisterController::class,'postRegister'])->name('register.new');//

Route::group(['middleware' => ['web','auth']], function () {
    Route::any('/payment', [PaymentController::class,'paymentNewRequest'])->name('payment.new');
    
});



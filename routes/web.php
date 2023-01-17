<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HeatController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', fn () => phpinfo());

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::resource('customers', CustomerController::class)->middleware(['auth', 'verified']);

Route::group(['middleware' => ['auth']], function () {
// customer related routes
Route::get('/customer', [App\Http\Controllers\CustomerController::class, 'index'])->name('customer');
Route::get('/customer/view', [App\Http\Controllers\CustomerController::class, 'index'])->name('customer/view');
Route::get('/customer/create', [App\Http\Controllers\CustomerController::class, 'create'])->name('customer/create');
Route::post('/customer/store', [App\Http\Controllers\CustomerController::class, 'store'])->name('customer/store');
Route::get('/customer/edit/{id}', [App\Http\Controllers\CustomerController::class, 'edit'])->name('customer/edit');
Route::post('/customer/update', [App\Http\Controllers\CustomerController::class, 'update'])->name('customer/update');
Route::post('/customer/delete', [App\Http\Controllers\CustomerController::class, 'destroy'])->name('customer/delete');
});


Route::any('/qr/generate', [App\Http\Controllers\HeatController::class, 'create'])->name('qr/generate');
Route::any('/qr/store', [App\Http\Controllers\HeatController::class, 'store']);
Route::any('/qr/delete/{id}', [App\Http\Controllers\HeatController::class, 'destroy']);
Route::get('/qr/previous', [App\Http\Controllers\HeatController::class, 'previous'])->name('qr/previous');
Route::any('/qr/getbydate', [App\Http\Controllers\HeatController::class, 'getBydate']);

Route::get('change-password', [ChangePassword::class,'index']);
Route::post('/change/password', [ChangePassword::class,'changePassword'])->name('profile.change.password');

Route::any('/users', [HomeController::class,'getUsers']);

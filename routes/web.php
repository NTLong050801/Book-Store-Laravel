<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\CategoryController;
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

Route::prefix('admin')->group(function () {

    Route::prefix('users')->group(function () {
    
        Route::get('/login',[LoginController::class,'index'])->name('admin.login');
        Route::post('/login',[LoginController::class,'store'])->name('admin.login.store');
    });

  
});
Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/home',[HomeController::class,'index'])->name('admin.home');
        Route::prefix('categories')->name('cate.')->group(function () {
            Route::get('/',[CategoryController::class,'index'])->name('index');
            Route::get('/add',[CategoryController::class,'create'])->name('create');
            Route::post('/add',[CategoryController::class,'store'])->name('store');
        });

    });
});
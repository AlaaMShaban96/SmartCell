<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\LocationController;

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
Route::group(['middleware' => ['isLogin']], function () {
    

    Route::get('/', [HomeController::class,'index'])->name('index');

    Route::get('/pdf/{id}', [OrderController::class,'printPDF']);

    Route::get('/order', [OrderController::class,'index'])->name('order');
    Route::get('/order/{id}', [OrderController::class,'show'])->name('order');
    Route::get('/order/{id}/edit', [OrderController::class,'edit'])->name('order');
    Route::put('/order/{id}', [OrderController::class,'update'])->name('order');
    Route::get('/order/{status}/{id}', [OrderController::class,'chengeStatusItem'])->name('order');
    Route::post('/order/send-to-user/{id}', [OrderController::class,'sendToUser'])->name('order');
    
    Route::get('/item', [ItemController::class,'index'])->name('item');
    Route::get('/item/{id}', [ItemController::class,'show'])->name('item');
    Route::get('/item/{id}/edit', [ItemController::class,'edit'])->name('item');
    Route::post('/item', [ItemController::class,'store'])->name('item');
    Route::post('/category', [ItemController::class,'storeCategory'])->name('item');
    Route::post('/category/{id}', [ItemController::class,'updateCategory'])->name('item');
    Route::post('/item/{id}', [ItemController::class,'update'])->name('item');
    Route::delete('/item/{id}', [ItemController::class,'destroy'])->name('item');
// 
    Route::get('/team', [TeamController::class,'index'])->name('team');
    Route::post('/team', [TeamController::class,'store'])->name('team');
    Route::post('/team/{email}', [TeamController::class,'update'])->name('team');
    Route::delete('/team/{email}', [TeamController::class,'destroy'])->name('team');

    Route::get('/location', [LocationController::class,'index'])->name('location');
    Route::post('/location', [LocationController::class,'update'])->name('location');
    Route::post('/setLocation', [LocationController::class,'store'])->name('location');
    Route::delete('/location/{id}', [LocationController::class,'destroy'])->name('location');


    Route::get('/setting', [SettingController::class,'index'])->name('setting');
    Route::post('/setting', [SettingController::class,'update'])->name('setting');
    Route::get('/logout', [HomeController::class,'logout']);

}); 


Route::get('/login', [HomeController::class,'loginShow'])->name('login');
Route::post('/login', [HomeController::class,'login']);
Route::get('/redirect', [HomeController::class,'redirectToProvider']);
Route::get('/callback', [HomeController::class,'handleProviderCallback']);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\OrderController;

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
Route::get('/', [HomeController::class,'index']);

Route::get('/pdf/{id}', [OrderController::class,'printPDF']);

Route::get('/order', [OrderController::class,'index']);
Route::get('/order/{id}', [OrderController::class,'show']);
Route::get('/order/{id}/edit', [OrderController::class,'edit']);
Route::put('/order/{id}', [OrderController::class,'update']);
Route::get('/order/{status}/{id}', [OrderController::class,'chengeStatusItem']);
Route::post('/order/send-to-user/{id}', [OrderController::class,'sendToUser']);

Route::get('/item', [ItemController::class,'index']);
Route::get('/item/{id}', [ItemController::class,'show']);
Route::get('/item/{id}/edit', [ItemController::class,'edit']);
Route::post('/item', [ItemController::class,'store']);
Route::post('/category', [ItemController::class,'storeCategory']);
Route::put('/item/{id}', [ItemController::class,'update']);

Route::get('/team', [TeamController::class,'index']);
Route::post('/team', [TeamController::class,'store']);
Route::post('/team/{email}', [TeamController::class,'update']);
Route::delete('/team/{email}', [TeamController::class,'destroy']);



Route::get('/login', [HomeController::class,'loginShow']);
Route::post('/login', [HomeController::class,'login']);
Route::get('/redirect', [HomeController::class,'redirectToProvider']);
Route::get('/callback', [HomeController::class,'handleProviderCallback']);

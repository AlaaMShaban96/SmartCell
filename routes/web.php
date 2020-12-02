<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('order/{id}/show', [OrderController::class,'show']);
Route::get('/', [HomeController::class,'index']);
Route::get('/redirect', [HomeController::class,'redirectToProvider']);
Route::get('/callback', [HomeController::class,'handleProviderCallback']);

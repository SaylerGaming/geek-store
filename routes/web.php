<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;

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

Route::get('/', [MainController::class, 'index']);
Route::get('/categories', [MainController::class, 'categories']);
Route::get('/category/{id}', [MainController::class, 'category']);
Route::get('/subcategory/{id}', [MainController::class, 'subcategory']);
Route::get('/product/{product}', [MainController::class, 'product']);

Route::group(['middleware' => 'guest'], function () {
    Route::get('/auth', [AuthController::class, 'auth'])->name('auth');
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/favorite/{id}', [MainController::class, 'favorite']);
    Route::get('/favorites', [MainController::class, 'favorites']);
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

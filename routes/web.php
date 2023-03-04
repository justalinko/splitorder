<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CRUD\PostController;
use App\Http\Controllers\CRUD\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CRUD\CommunityController;
use App\Http\Controllers\CRUD\ExpeditionController;
use App\Http\Controllers\CRUD\ProductController;
use App\Http\Controllers\WorkController;
use App\Models\Product;

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

Route::get('/', [DashboardController::class , 'home']);

Route::get('/auth/login' , [AuthController::class , 'login'] )->name('login');
Route::post('/auth/login' , [AuthController::class , 'loginPost']);
Route::get('/auth/logout' , [AuthController::class , 'logout']); 
Route::get('/auth/register' , [AuthController::class , 'register'])->name('register');
Route::post('/auth/register' , [AuthController::class , 'registerPost']);
Route::get('/flow' , function(){
    return view('flow');
});

Route::group(['prefix' => '/home'] , function(){
    Route::get('/tentang-kami' , [DashboardController::class , 'about']);

    Route::get('/produk' , [DashboardController::class , 'allProduct']);
    Route::get('/produk/{slug}' , [DashboardController::class , 'productDetail']);
    Route::get('/berita' , [DashboardController::class , 'allNews']);
    Route::get('/berita/{slug}' , [DashboardController::class , 'newsDetail']);
    Route::get('/beli/{id}' , [DashboardController::class , 'beli']);    
    Route::post('/beli' , [DashboardController::class , 'beliPost']);
    Route::get('/invoice/{id}' , [DashboardController::class , 'invoice']);
    Route::get('/kontak' , [DashboardController::class , 'contact']);
});




Route::group(['middleware' => 'auth'] ,function(){

    Route::get('/dashboard' , [DashboardController::class , 'index']);
    Route::post('/auth/update' , [AuthController::class , 'update']);
    Route::group(['prefix' => '/orders'] , function(){
    Route::get('/' , [OrderController::class , 'index']);
    Route::get('/{id}/distribute' , [OrderController::class , 'distributeOrder']);
    Route::get('/{id}/edit' , [OrderController::class , 'edit']);
    Route::post('/{id}/edit' , [OrderController::class , 'update']);
    Route::get('/add' , [OrderController::class , 'create']);
    Route::post('/add',[OrderController::class , 'store']);

    Route::post('/{id}/distribute' , [OrderController::class , 'distributeOrderPost']);

    Route::get('/{id}/share' , [OrderController::class , 'sharedOrder']);
    Route::post('/{id}/share' , [OrderController::class , 'sharedOrderPost']);
    Route::get('/{id}/done' , [OrderController::class , 'doneOrder']);
    Route::get('/{id}/delay' , [OrderController::class , 'delayOrder']);
    Route::post('{id}/delay' , [OrderController::class , 'delayOrderPost']);
    });
    Route::group(['prefix' => '/works'] , function(){

        Route::get('/' , [WorkController::class , 'index']);
        Route::get('/monitor' , [WorkController::class , 'monitor']);
        Route::get('/{id}/done' , [WorkController::class , 'done']);
        Route::post('/{id}/delay' , [WorkController::class , 'delay']);
        Route::get('/{id}/production' , [WorkController::class , 'production']);
    });

    Route::get('/distribution' , [OrderController::class , 'distribute']);

    Route::group(['prefix' => '/shipping'] , function(){
    Route::get('/' , [OrderController::class , 'shipping']);
    Route::get('/{id}/add' , [OrderController::class , 'orderShipping']);
    Route::post('/{id}/add' , [OrderController::class , 'orderShippingPost']);
    });
    Route::group(['prefix' => '/anggota'],function(){
        Route::get('/' , [UserController::class , 'index']);
        Route::get('/add' , [UserController::class , 'create']);
        Route::post('/add' , [UserController::class , 'store']);
        Route::get('/{id}/edit' , [UserController::class , 'edit']);
        Route::post('/{id}/edit' , [UserController::class , 'update']);
        Route::get('/{id}/delete' , [UserController::class , 'destroy']);
    });

    Route::group(['prefix' => '/komunitas'] , function()
    {
        Route::get('/' , [CommunityController::class , 'index']);
        Route::get('/add' , [CommunityController::class , 'create']);
        Route::post('/add' , [CommunityController::class , 'store']);
        Route::get('/{id}/edit' , [CommunityController::class , 'edit']);
        Route::post('/{id}/edit' , [CommunityController::class , 'update']);
        Route::get('/{id}/delete' , [CommunityController::class , 'destroy']);
    });

    Route::group(['prefix' => '/ekspedisi'] , function(){
        Route::get('/' , [ExpeditionController::class , 'index']);
        Route::get('/add' , [ExpeditionController::class , 'create']);
        Route::post('/add' , [ExpeditionController::class , 'store']);
        Route::get('/{id}/edit' , [ExpeditionController::class , 'edit']);
        Route::post('/{id}/edit' , [ExpeditionController::class , 'update']);
        Route::get('/{id}/delete' , [ExpeditionController::class , 'destroy']);
    });

    Route::group(['prefix' => '/post'] , function(){
        Route::get('/' , [PostController::class , 'index']);
        Route::get('/add' , [PostController::class , 'create']);
        Route::post('/add' , [PostController::class , 'store']);
        Route::get('/{id}/edit' , [PostController::class , 'edit']);
        Route::post('/{id}/edit' , [PostController::class , 'update']);
        Route::get('/{id}/delete' , [PostController::class , 'destroy']);
    });

    Route::group(['prefix' => '/product'] , function(){
        Route::get('/' , [ProductController::class , 'index']);
        Route::get('/add' , [ProductController::class , 'create']);
        Route::post('/add' , [ProductController::class , 'store']);
        Route::get('/{id}/edit' , [ProductController::class , 'edit']);
        Route::post('/{id}/edit' , [ProductController::class , 'update']);
        Route::get('/{id}/delete' , [ProductController::class , 'destroy']);
    });

   
});
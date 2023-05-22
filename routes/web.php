<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\HomePageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TopupController;
use App\Http\Controllers\Admin\UserController;
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

Route::get('/', [HomePageController::class, 'index']);

Route::group(
    ['middleware' => 'auth'],
    function() {
        Route::get('/post/{title}',[HomePageController::class, 'show']);    
        Route::post('order/store/{id}',[OrderController::class, 'store']);
    }
);


Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('user-login', [AuthController::class, 'login'])->name('login.user');
Route::get('register', [AuthController::class, 'register'])->name('register-user');
Route::post('user-register', [AuthController::class, 'userRegister'])->name('register.user'); 
Route::get('logout', [AuthController::class, 'logOut'])->name('logout'); 

Route::get('collection', CollectionController::class);
Route::get('searchPost', [CollectionController::class, 'search']);
Route::get('filterCategory',[CollectionController::class,'filter']);

Route::group( 
['prefix' => 'admin','middleware' => ['auth']],
    function() {
        Route::get('dashboard', [DashboardController::class, 'index']);
        Route::resource('post', PostController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('users', UserController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('topup', TopupController::class);
        Route::get('order', [OrderController::class, 'index']);
    }   
);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

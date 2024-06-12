<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CarControllerAdmin;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');


Route::group(['middleware' => ['auth']],function (){

    Route::group(['middleware' => ['admin']],function (){
        
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::get('/adminpage',[HomeController::class,'index'])->name('adminmain');

        Route::get('/car_admin',[ CarControllerAdmin::class,'index_admin'])->name('admin');
        Route::get('/cars/create_admin',[CarControllerAdmin::class,'create_admin'])->name('product.create.admin');
        Route::post('/car2_admin',[CarControllerAdmin::class,'store_admin'])->name('product.store.admin');
        Route::get('/car/{car}/edit_admin',[CarControllerAdmin::class,'edit_admin'])->name('product.edit.admin');
        Route::put('/car/{car}/update_admin',[CarControllerAdmin::class,'update_admin'])->name('product.update.admin');
        Route::delete('/car/{car}/delete_admin',[CarControllerAdmin::class,'delete_admin'])->name('product.delete.admin');

//Category routes

Route::get('category',[CategoryController::class,'index'])->name('category.index');
Route::get('category/create',[CategoryController::class,'create'])->name('category.create');
Route::post('category',[CategoryController::class,'store'])->name('category.store');;

        Route::get('/adminpage/users', [AdminController::class, 'showUsers'])->name('admin.users');

    });

    Route::group(['middleware' => ['user']],function (){

        
        Route::get('/user',[ UserController::class,'user'])->name('user');

        
        Route::get('/car_user',[ CarController::class,'index'])->name('user_car');
        Route::get('/car',[ CarController::class,'index'])->name('product.index');
        Route::get('/cars/create',[CarController::class,'create'])->name('product.create');
        Route::post('/car2',[CarController::class,'store'])->name('product.store');
        Route::get('/car/{car}/edit',[CarController::class,'edit'])->name('product.edit');
        Route::put('/car/{car}/update',[CarController::class,'update'])->name('product.update');
        Route::delete('/car/{car}/delete',[CarController::class,'delete'])->name('product.delete');



        
    });
    
});

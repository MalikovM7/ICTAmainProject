<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CarControllerAdmin;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CVController;




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
        
        


        Route::get('/new_car',[HomeController::class,'NewCar'])->name('new_car');

        Route::post('/add_new_car',[HomeController::class,'AddNewCar'])->name('add_new_car');







        Route::get('/adminpage',[HomeController::class,'index'])->name('adminmain');

        Route::post('/adminpage',[HomeController::class,'index'])->name('adminmain');

        Route::get('/car_admin',[ CarControllerAdmin::class,'index_admin'])->name('admin');
        Route::get('/cars/create_admin',[CarControllerAdmin::class,'create_admin'])->name('product.create.admin');
        Route::post('/car2_admin',[CarControllerAdmin::class,'store_admin'])->name('product.store.admin');
        Route::get('/car/{car}/edit_admin',[CarControllerAdmin::class,'edit_admin'])->name('product.edit.admin');
        Route::put('/car/{car}/update_admin',[CarControllerAdmin::class,'update_admin'])->name('product.update.admin');
        Route::delete('/car/{car}/delete_admin',[CarControllerAdmin::class,'delete_admin'])->name('product.delete.admin');

//Category routes

Route::get('category',[CategoryController::class,'index'])->name('category.index');
Route::get('category/create',[CategoryController::class,'create'])->name('category.create');
Route::post('category',[CategoryController::class,'store'])->name('category.store');
Route::get('/category/{category}/edit',[CategoryController::class,'edit'])->name('category.edit');
Route::put('/category/{category}/update',[CategoryController::class,'update'])->name('category.update');
Route::delete('/category/{category}/delete',[CategoryController::class,'delete'])->name('category.delete');


//Collections

Route::get('/collections',[CategoryController::class],'category')->name('collection.index');;


//CV_Admin

Route::get('/cvs', [AdminController::class, 'viewCVs'])->name('admin.cvs');
Route::post('/cvs/{id}/accept', [AdminController::class, 'acceptCV'])->name('admin.acceptCV');
Route::post('/cvs/{id}/reject', [AdminController::class, 'rejectCV'])->name('admin.rejectCV');

// Route to display manual CVs
Route::get('admin/manual-cvs', [AdminController::class, 'viewManualCVs'])->name('admin.manualCVs');

// Route to store a new manual CV
Route::post('admin/manual-cvs', [AdminController::class, 'storeManualCV'])->name('cv.manual.store');

// Routes to accept or reject a manual CV
Route::post('admin/manual-cvs/accept/{id}', [AdminController::class, 'acceptManualCV'])->name('manualCV.accept');
Route::post('admin/manual-cvs/reject/{id}', [AdminController::class, 'rejectManualCV'])->name('manualCV.reject');







        Route::get('/adminpage/users', [AdminController::class, 'showUsers'])->name('admin.users');
        Route::get('/adminpage/category', [AdminController::class, 'showCategories'])->name('admin.categories');
        Route::get('/adminpage', [AdminController::class, 'adminPage'])->name('admin.newSignups');

        
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

//Email Route


Route::post('send',[UserController::class,'sendnotification'])->name('user.mail');

//Categories

Route::get('/user/category', [UserController::class, 'showCategories'])->name('user.categories');
Route::post('/user/category', [UserController::class, 'showCategories'])->name('user.categories');


//CV



    Route::get('/cvdashboard', [CVController::class, 'index'])->name('cvdashboard');
    Route::get('/cv/upload', [CVController::class, 'create'])->name('cv.create');
    Route::post('/cv/upload', [CVController::class, 'upload'])->name('cv.upload');

    Route::get('/cv/manual', [CVController::class, 'manualCreateForm'])->name('cv.manual.create');
    Route::post('/cv/manual', [CVController::class, 'manualCreate'])->name('cv.manual.store');

    Route::post('/cv/{id}/vip', [CVController::class, 'markAsVIP'])->name('cv.vip');
        
    });
    
});

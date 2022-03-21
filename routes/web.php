<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Models\User;
// use Auth;


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

Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
});




Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

//Admin Routes Start

    Route::get('/logout',[AdminController::class,'destroy'])->name('admin.logout');
    Route::get('/admin/profile',[AdminProfileController::class,'AdminProfile'])->name('admin.profile');
    Route::get('/admin/profile/edit',[AdminProfileController::class,'EditAdminProfile'])->name('admin.edit.profile');
    Route::post('/admin/profile/store',[AdminProfileController::class,'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password',[AdminProfileController::class,'AdminCpassword'])->name('admin.cpassword');
    Route::post('/admin/update/password',[AdminProfileController::class,'AdminUpdatePassword'])->name('admin.update.password');


// User All Route

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard',compact('user'));
})->name('dashboard');

Route::get('/',[IndexController::class,'Index']);
Route::get('/user/logout',[IndexController::class,'UserLogout'])->name('user.logout');
Route::get('/user/profile',[IndexController::class,'UserProfile'])->name('user.profile');
Route::post('/user/profile/store',[IndexController::class,'UserProfileStore'])->name('user.profile.store');
Route::get('/user/changepassword',[IndexController::class,'UserChangePassword'])->name('change.password');
Route::post('user/updatepassword',[IndexController::class,'UpdatePassword'])->name('user.updatepassword');

// Admin Brands

Route::prefix('brands')->group(function(){
    
    Route::get('/view',[BrandController::class,'ViewBrand'])->name('all.brands');
    Route::post('/store',[BrandController::class,'BrandStore'])->name('brand.store');
    Route::get('edit/{id}',[BrandController::class,'EditBrand'])->name('edit.brand');
    Route::post('update/',[BrandController::class,'UpdateBrand'])->name('brand.update');
    Route::get('delete/{id}',[BrandController::class,'DeleteBrand'])->name('delete.brand');


});



Route::prefix('category')->group(function(){


// All category

    Route::get('/view',[CategoryController::class,'ViewCategory'])->name('all.category');
    Route::post('/store',[CategoryController::class,'CategoryStore'])->name('category.store');
    Route::get('edit/{id}',[CategoryController::class,'EditCategory'])->name('edit.category');
    Route::post('/update',[CategoryController::class,'CategoryUpdate'])->name('category.update');
    Route::get('delete/{id}',[CategoryController::class,'DeleteCategory'])->name('delete.category');


//All Sub Category


    Route::get('/view',[SubCategoryController::class,'ViewSubCategory'])->name('all.subcategory');




});

<?php

use App\Http\Controllers\admin\CategoriesController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ClothController;
use App\Http\Controllers\Admin\SellerController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LoginController;
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





// admin
//  Route::group(['prefix'=>'admin','as'=>'admin.'], function(){
    Route::get('/login',[LoginController::class,'login'])->name('admin.login');
    Route::post('/do/login',[LoginController::class,'doLogin'])->name('admin.doLogin');

    Route::get('auth/facebook', [LoginController::class, 'facebookRedirect'])->name('login.facebook');
    Route::get('auth/facebook/callback', [LoginController::class, 'loginWithFacebook']);

    Route::get('/auth/google',[LoginController::class,'googleRedirect'])->name('login.google');
    Route::get('/auth/google/callback',[LoginController::class,'loginWithGoogle']);

    Route::get('/forget-password',[LoginController::class,'forgetPassword'])->name('forget.password');
    Route::post('/forget-password/post',[LoginController::class,'forgetPasswordPost'])->name('forget.password.post');

    Route::get('/reset-password/{token}',[LoginController::class,'resetPassword'])->name('reset.password');
    Route::post('/reset-password/post',[LoginController::class,'resetPasswordPost'])->name('reset.password.post');
   

    Route::group(['prefix'=>'/','middleware'=>'auth:web,admin'],function () {
    Route::get('/', function () {
        return view('admin.master');
     })->name('admin.home');

     Route::get('/logout',[LoginController::class,'logout'])->name('admin.logout');


// categories
Route::get('/category_list',[CategoriesController::class, 'list'])->name('category.list');
Route::get('/category_create',[CategoriesController::class, 'create'])->name('category.create');
Route::post('/category_store',[CategoriesController::class, 'store'])->name('category.store');
Route::get('/category_edit/{category_id}',[CategoriesController::class, 'edit'])->name('category.edit');
Route::post('/category_update/{category_id}',[CategoriesController::class, 'update'])->name('category.update');
Route::get('/category_delete/{category_id}',[CategoriesController::class,'delete'])->name('category.delete');



//for cloth
Route::get('/add/cloth',[ClothController::class,'addCloth'])->name('add.cloth');
Route::get('/cloth/list',[ClothController::class,'clothlist'])->name('cloth.list');
Route::post('/cloth/create',[ClothController::class,'clothCreate'])->name('cloth.list.create');

//cloth route end

//for seller
Route::get('/seller/list',[SellerController::class,'sellerlist'])->name('seller.list');
Route::get('/seller/create',[SellerController::class,'sellercreate'])->name('seller.create');
Route::post('/seller.store',[SellerController::class,'sellerstore'])->name('seller.store');

Route::get('/cloth/view/{cloth_id}',[ClothController::class,'viewCloth'])->name('cloth.view');
Route::get('/edit/cloth/{cloth_id}',[ClothController::class,'editCloth'])->name('cloth.edit');
Route::put('/update/cloth/{cloth_id}',[ClothController::class,'updateCloth'])->name('cloth.update');
Route::get('/delete/cloth/{cloth_id}',[ClothController::class,'deleteCloth'])->name('cloth.delete');




Route::get('/add/role/',[RoleController::class,'addRole'])->name('role.add');
Route::get('/list/role/',[RoleController::class,'listRole'])->name('role.list');
Route::post('/role/store/',[RoleController::class,'roleStore'])->name('role.store');
Route::get('/delete/role/{role_id}',[RoleController::class,'deleteRole'])->name('role.delete');


Route::get('/add/user',[UserController::class,'addUser'])->name('user.add');
Route::get('/list/user',[UserController::class,'listUser'])->name('user.list');
Route::post('/store/user',[UserController::class,'storeUser'])->name('user.store');
Route::get('/delete/user/{user_id}',[UserController::class,'deleteUser'])->name('user.delete');


Route::get('/permissions/assign/{role_id}',[RoleController::class,'assignForm'])->name('permission.assign.form');
Route::post('/permissions/assign/store',[RoleController::class,'assignStore'])->name('permission.assign.store');


});



<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController as ControllersLoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

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

//Cliend 
Route::get('/index',[ProductController::class,'listProducts'])->name('product.index');
Route::get('/detail/{id}',[ProductController::class,'DetailProduct'])->name('product.detail');
Route::get('/listPro',[ProductController::class,'GetAll'])->name('product.list');


Route::middleware(AdminMiddleware::class)->group(function () {
//admin product
Route::get('/list', [ProductController::class, 'GetAllForAdmin'])->name('prolist');
// Thêm sản phẩm
Route::post('/create', [ProductController::class, 'store'])->name('pro.store');
// Chỉnh sửa sản phẩm
Route::get('/product/{id}', [ProductController::class, 'edit'])->name('pro.edit');
Route::put('edit/{id}', [ProductController::class,'update'])->name('pro.update');
// Xóa sản phẩm
Route::delete('delete/{id}', [ProductController::class, 'destroy'])->name('pro.destroy');
// total product
Route::get('/dashboard', [ProductController::class, 'dashboardPro'])->name('dashboardPro');

//admin Category
Route::get('/Category', [CategoryController::class, 'GetAllCate'])->name('catelist');
// Thêm Category
Route::post('/Category', [CategoryController::class, 'store'])->name('CateStore');
// Chỉnh Category
Route::get('/Category/{id}', [CategoryController::class, 'edit'])->name('CateEdit');
Route::put('/Category/{id}', [CategoryController::class,'update']);
// Xóa Category
Route::delete('Category/{id}', [CategoryController::class, 'destroy'])->name('CateDestroy');

//admin User
Route::get('/Userlist', [UserController::class, 'GetAllUser'])->name('Userlist');
// Thêm User
Route::post('/user', [UserController::class, 'store'])->name('userstore');
// update trang thai user
Route::get('/user/{id}', [UserController::class, 'edit'])->name('userEdit');
Route::put('user/{id}', [UserController::class,'update']);
// Xóa User
Route::delete('user/{id}', [UserController::class, 'destroy'])->name('userDestroy');
Route::post('/user/toggle-active/{id}', [UserController::class, 'toggleActive'])->name('user.toggleActive');


});

//login 
Route::get('/',[ControllersLoginController::class,'Login'])->name('login');
Route::post('/login',[ControllersLoginController::class, 'PostLogin'])->name('postLogin');
 Route::get('/logout',[ControllersLoginController::class, 'logout'])->name('logout');
Route::get('/register',[ControllersLoginController::class, 'register'])->name('register');
Route::post('/register',[ControllersLoginController::class, 'PostRegister'])->name('postRegister');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\users\LoginController;
use App\Http\Controllers\admin\MainController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\PeopleController;

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
Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class, 'store'])->name('user.store');

Route::get('admin/main', [MainController::class, 'index'])->name('admin')->middleware('auth');

Route::resource('category', CategoryController::class);
Route::get('Cabin_category', [CategoryController::class, 'cabin'])->name('category.cabin');
Route::get('Restore_category/{id}', [CategoryController::class, 'restore'])->name('category.restore');
Route::get('Restore-all', [CategoryController::class, 'restore_all'])->name('category.restore_all');
Route::get('Delete-all', [CategoryController::class, 'delete_all'])->name('category.delete_all');

Route::resource('product', ProductController::class);

Route::get('Cabin', [ProductController::class, 'cabin'])->name('product.cabin');
Route::get('Restore/{id}', [ProductController::class, 'restore'])->name('product.restore');
Route::resource('slider', SliderController::class);
Route::get('home', [PeopleController::class, 'home'])->name('people.home');
Route::get('home', [PeopleController::class, 'home'])->name('people.home');

// c1 route tìm kiếm 
Route::get('users/{id}', [UserController::class, 'index'])->name('user.index');
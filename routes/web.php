<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// เมนู user
Route::get('admin/user/index',[UserController::class, 'index'])->name('u.index');

// เมนู category
Route::get('admin/category/index',[CategoryController::class, 'index'])->name('u.category');
Route::get('admin/category/createform',[CategoryController::class, 'createform'])->name('u.createform');
Route::get('admin/category/edit/{id}',[CategoryController::class, 'edit'])->name('u.edit');
Route::post('admin/product/insert',[CategoryController::class, 'insert']);
Route::post('admin/category/update{id}',[CategoryController::class, 'update']);
Route::post('admin/category/delete{id}',[CategoryController::class, 'delete']);

// เมนู product
Route::get('admin/product/index',[ProductController::class, 'index'])->name('u.product');
Route::get('admin/product/productform',[ProductController::class, 'productform'])->name('u.productform');
Route::get('admin/product/productedit/{id}',[ProductController::class, 'productedit'])->name('u.productedit');
Route::post('admin/product/insert',[ProductController::class, 'insert']);
Route::post('admin/product/update/{id}',[ProductController::class, 'update']);
Route::get('admin/product/delete/{id}',[ProductController::class, 'delete']);

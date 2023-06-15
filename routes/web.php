<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('company/index',[CompanyController::class,'index'])->name('index');
    Route::post('company/store',[CompanyController::class,'store'])->name('store');
    Route::get('/delete/{id}',[CompanyController::class,'delete'])->name('delete');
    Route::get('/edit/{id}',[CompanyController::class,'edit'])->name('edit');
    Route::get('product/index',[ProductController::class,'index'])->name('product.index');
    Route::post('product/store',[ProductController::class,'store'])->name('product.store');
});

require __DIR__.'/auth.php';

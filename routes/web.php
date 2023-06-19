<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CustomerController;
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
    Route::get('company/index',[CompanyController::class,'index'])->name('company.index');
    Route::post('company/store',[CompanyController::class,'store'])->name('company.store');
    // Route::get('/delete/{id}',[CompanyController::class,'delete'])->name('company.delete');
    // Route::get('edit/{id}',[CompanyController::class,'edit'])->name('company.edit');
    Route::get('company/export',[CompanyController::class,'export'])->name('company.export');
    Route::get('company/export/{id}',[CompanyController::class,'export_ind'])->name('company.export_ind');
    Route::get('/company/{id}/edit',[CompanyController::class,'edit'])->name('companyedit');
    Route::get('/company/{id}/delete',[CompanyController::class,'delete'])->name('companydelete');
    Route::get('product/index',[ProductController::class,'index'])->name('product.index');
    Route::post('product/store',[ProductController::class,'store'])->name('product.store');
    Route::get('/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
    Route::get('/delete/{id}',[ProductController::class,'delete'])->name('product.delete');
    Route::get('customer/index',[CustomerController::class,'index'])->name('customer.index');
    Route::post('customer/store',[CustomerController::class,'store'])->name('customer.store');
    Route::get('edit/{id}',[CustomerController::class,'edit'])->name('customer.edit');

    Route::get('delete/{id}',[CustomerController::class,'delete'])->name('customer.delete');
});


require __DIR__.'/auth.php';

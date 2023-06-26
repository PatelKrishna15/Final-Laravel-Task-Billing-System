<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Mail;
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
    Route::get('company/export',[CompanyController::class,'export'])->name('company.export');
    Route::get('company/export/{id}',[CompanyController::class,'export_ind'])->name('company.export_ind');
    Route::get('/company/{id}/edit',[CompanyController::class,'edit'])->name('companyedit');
    Route::get('/company/{id}/delete',[CompanyController::class,'delete'])->name('companydelete');
  
    Route::get('product/index',[ProductController::class,'index'])->name('product.index');
    Route::post('product/store',[ProductController::class,'store'])->name('product.store');
    Route::get('product/export',[ProductController::class,'export'])->name('product.export');
    Route::get('product/export',[ProductController::class,'export'])->name('product.export');
    Route::get('product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
    Route::get('product/delete/{id}',[ProductController::class,'delete'])->name('product.delete');
  
    Route::get('customer/index',[CustomerController::class,'index'])->name('customer.index');
    Route::post('customer/store',[CustomerController::class,'store'])->name('customer.store');
    Route::get('customer/export',[customerController::class,'export'])->name('customer.export');
    Route::get('customer/export/{id}',[CustomerController::class,'export_indv'])->name('customer.export_ind');
    Route::get('customer/edit/{id}',[CustomerController::class,'edit'])->name('customer.edit');
    Route::get('customer/delete/{id}',[CustomerController::class,'delete'])->name('customer.delete');

    Route::get('/index',[NotesController::class,'index'])->name('notes.index');
    Route::post('notes/store',[NotesController::class,'store'])->name('notes.store');
    Route::get('notes/edit/{id}',[NotesController::class,'edit'])->name('notes.edit');
    Route::get('notes/delete/{id}',[NotesController::class,'delete'])->name('notes.delete');
    Route::get('payment/index',[PaymentController::class,'index'])->name('payment.index');
    Route::post('payment/store',[PaymentController::class,'store'])->name('payment.store');
    
    Route::get('getproducts',[PaymentController::class,'getproducts'])->name('getproducts');
    // Route::get('payment/export/{id}',[PaymentController::class,'export_ind'])->name('payment.export_ind');
    Route::get('payment/delete/{id}',[PaymentController::class,'delete'])->name('payment.delete');
    Route::get('send_mail_pdf', [PaymentController::class, 'sendMailWithPDF'])->name('payment.mail_pdf');

    
});



require __DIR__.'/auth.php';

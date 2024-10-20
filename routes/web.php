<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\LoanController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Halaman utama
Route::get('/', [IndexController::class, 'utama'])->name('home');

// Autentikasi route bawaan Laravel (login, register, dll.)
Auth::routes();

// Proteksi route menggunakan middleware auth
Route::middleware(['auth'])->group(function () {

    // CRUD Category

    // Untuk menuju form create category
    Route::get('/category/create', [CategoriesController::class, 'create'])->name('category.create');

    // Untuk menyimpan data ke database category
    Route::post('/category', [CategoriesController::class, 'store'])->name('category.store');

    // Read data category
    Route::get('/category', [CategoriesController::class, 'index'])->name('category.index');

    // Read data category berdasarkan id
    Route::get('/category/{id}', [CategoriesController::class, 'show'])->name('category.show');

    // Untuk menuju form update category
    Route::get('/category/update/{id}', [CategoriesController::class, 'edit'])->name('category.edit');

    // Untuk menyimpan data update ke database category
    Route::put('/category/{id}', [CategoriesController::class, 'update'])->name('category.update');

    // Delete category
    Route::delete('/category/{id}', [CategoriesController::class, 'destroy'])->name('category.destroy');

    // CRUD Books
    // Resource controller untuk books
    
});
Route::resource('books', BooksController::class);

// Route untuk logout
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::post('/books/{book}/loan', [LoanController::class, 'store'])->name('loan.store');
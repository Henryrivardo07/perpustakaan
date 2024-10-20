<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use Illuminate\Support\Facades\Auth;


Route::get('/', [IndexController::class, 'utama'] );



//CRUD
//Create

//Untuk menuju form category
Route::get('category/create', [CategoriesController::class, 'create'] );

//untuk menyimpan data ke database category
Route::post("/category", [CategoriesController::class, 'store'] );

//Read

//Read data category
Route::get('/category', [CategoriesController::class, 'index'] );

// read data category berdasarkan id
Route::get('/category/{id}', [CategoriesController::class, 'show'] );   

//Update

//Untuk menuju form update category
Route::get('/category/update/{id}', [CategoriesController::class, 'edit'] );

//untuk menyimpan data update ke database category
Route::put('/category/{id}', [CategoriesController::class, 'update'] );

//Delete
//Untuk menuju form delete category
Route::get('/category/delete/{id}', [CategoriesController::class, 'destroy'] );

//untuk menyimpan data delete ke database category
Route::delete('/category/{id}', [CategoriesController::class, 'destroy'] );


//CRUD Books
//Create
Route::resource('books', BooksController::class);


Auth::routes();

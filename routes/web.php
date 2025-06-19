<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

Route::get('/News',  [NewsController::class,'index']);
Route::post('/News',[NewsController::class,'store'])->name('news.store');
Route::get('/News/create',[NewsController::class,'create'])->name('news.create');
Route::get('/News/{news}',[NewsController::class,'show'])->name('news.show');
Route::put('/News/{news}',[NewsController::class,'update'])->name('news.update');
Route::get('/News/{news}/edit',[NewsController::class,'edit'])->name('news.edit');


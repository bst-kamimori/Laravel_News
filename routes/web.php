<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

Route::get('/News',  [NewsController::class,'index']);
Route::post('/News',[NewsController::class,'store'])->name('news.store');
Route::get('/News/{news}',[NewsController::class,'show'])->name('news.show');
Route::get('/News/Create',[NewsController::class,'create'])->name('news.create');

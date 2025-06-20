<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

Route::get('/News',  [NewsController::class,'index'])->name('news.index');
Route::post('/News',[NewsController::class,'store'])->name('news.store');
Route::get('/News/create',[NewsController::class,'create'])->name('news.create');
Route::get('/News/{n_id}',[NewsController::class,'show'])->name('news.show');
Route::put('/News/{n_id}',[NewsController::class,'update'])->name('news.update');
Route::delete('/News/{n_id}',[NewsController::class,'delete'])->name('news.delete');
Route::get('/News/{n_id}/edit',[NewsController::class,'edit'])->name('news.edit');

//Route::group()

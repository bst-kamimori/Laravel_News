<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;


Route::prefix('News')
    ->name('news.')
    ->controller(NewsController::class)
    ->group(function(){
    Route::get('', 'index')->name('index');
    Route::post('','store')->name('store');
    Route::get('create','create')->name('create');
    Route::get('{news}','show')->name('show');
    Route::put('{news}','update')->name('update');
    Route::delete('{news}','delete')->name('delete');
    Route::get('{news}/edit','edit')->name('edit');
});


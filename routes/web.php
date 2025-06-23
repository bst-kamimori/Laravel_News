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
    Route::get('{id}','show')->name('show');
    Route::put('{id}','update')->name('update');
    Route::delete('{id}','delete')->name('delete');
    Route::get('{id}/edit','edit')->name('edit');
});


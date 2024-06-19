<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlimentoController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('home', AlimentoController::class);

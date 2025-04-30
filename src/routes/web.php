<?php

use App\Http\Controllers\register\ShowRegisterController;
use App\Http\Controllers\register\StoreRegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Start Project
// 登録画面表示
Route::get('/register', ShowRegisterController::class)->name('register');

// 登録処理
Route::post('/store', StoreRegisterController::class)->name('store');

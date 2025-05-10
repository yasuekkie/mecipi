<?php

use App\Http\Controllers\register\ShowRegisterController;
use App\Http\Controllers\register\StoreRegisterController;
use App\Http\Controllers\top\SearchTopController;
use App\Http\Controllers\top\ShowTopController;
use Illuminate\Support\Facades\Route;

// テスト用
Route::get('/laravel', function () {
    return view('welcome');
});

// Start Project
// 一覧画面表示
Route::get('/', ShowTopController::class)->name('index');

// 検索結果表示
Route::post('/', SearchTopController::class)->name('search');

// 登録画面表示
Route::get('/register', ShowRegisterController::class)->name('register');

// 登録処理
Route::post('/store', StoreRegisterController::class)->name('store');

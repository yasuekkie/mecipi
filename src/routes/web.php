<?php

use App\Http\Controllers\register\ShowRegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Start Project
Route::get('/register', ShowRegisterController::class);

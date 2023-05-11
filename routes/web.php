<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::post('store-or-update', [UserController::class, 'store_or_update'])->name('user.store_or_update');

<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

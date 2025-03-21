<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;

Route::get('/', function () {
    return view('pages.welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/ufo-reportings', [ReportController::class ,'index'])->name('ufo-reportings');
Route::get('/ufo-reporting/create', [ReportController::class ,'create'])->name('ufo-reporting.create');
Route::post('/ufo-reporting', [ReportController::class, 'store']);
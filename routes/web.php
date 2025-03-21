<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;

Route::get('/', function () {
    return view('pages.welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/uap-reportings', [ReportController::class ,'index'])->name('uap-reportings');
Route::get('/uap-reporting/create', [ReportController::class ,'create'])->name('uap-reporting.create');
Route::post('/uap-reporting', [ReportController::class, 'store']);
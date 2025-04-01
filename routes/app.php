<?php 
use App\Http\Controllers\ReportController; 
use App\Http\Controllers\HomeController;

#Route::get('/', function () {return view('welcome');});

Route::middleware(['access.log:123321,pass'])->group( function () {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    Route::get('/report/json', [ReportController::class, 'json'])->name('home.json');
    Route::get('/uap-reportings', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/uap-reporting/create', [ReportController::class, 'create'])->name('report.create');
    Route::post('/uap-reporting/create', [ReportController::class, 'store']);
    Route::get('/contact', [ReportController::class, 'store'])->name('contact.index');
});
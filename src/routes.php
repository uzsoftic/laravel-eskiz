<?php
use Illuminate\Support\Facades\Route;
use Uzsoftic\LaravelEskiz\LaravelEskiz;
use Uzsoftic\LaravelEskiz\LaravelEskizController;

Route::name('eskizsms.')->prefix(config('laravel-eskiz.route_prefix'))->group(function (){
    Route::post('/send', [LaravelEskiz::class, 'send'])->name('send');
});

Route::name('eskizsms.')->prefix(config('laravel-eskiz.admin_route_prefix'))->middleware(config('laravel-eskiz.admin_middleware'))->group(function (){
    Route::any('/dashboard', [LaravelEskizController::class, 'dashboard'])->name('dashboard');
    Route::any('/listing', [LaravelEskizController::class, 'listing'])->name('listing');
    Route::any('/config', [LaravelEskizController::class, 'config'])->name('config');
    Route::any('/sender', [LaravelEskizController::class, 'sender'])->name('sender');
});


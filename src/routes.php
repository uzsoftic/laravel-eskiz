<?php
use Illuminate\Support\Facades\Route;
use Uzsoftic\LaravelEskiz\LaravelEskiz;
use Uzsoftic\LaravelEskiz\LaravelEskizController;

Route::name('eskizsms.')->prefix(config('laravel-eskiz.route_prefix'))->group(function (){
    Route::post('/send', [LaravelEskiz::class, 'send'])->name('send');
    Route::post('/callback', [LaravelEskiz::class, 'callback'])->name('callback');
});

Route::name('eskizsms.')->prefix(config('laravel-eskiz.admin_route_prefix'))->middleware(config('laravel-eskiz.admin_middleware'))->group(function (){
    Route::get('/dashboard', [LaravelEskizController::class, 'dashboard'])->name('dashboard');
    Route::get('/listing', [LaravelEskizController::class, 'listing'])->name('listing');
    Route::get('/config', [LaravelEskizController::class, 'config'])->name('config');
    Route::get('/sender', [LaravelEskizController::class, 'sender'])->name('sender');
    Route::post('/config', [LaravelEskizController::class, 'configUpdate'])->name('config.action');
    Route::post('/sender', [LaravelEskizController::class, 'senderSend'])->name('sender.action');
});


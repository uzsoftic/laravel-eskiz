<?php
use Illuminate\Support\Facades\Route;
use Uzsoftic\LaravelEskiz\LaravelEskiz;

Route::name('eskizsms.')->prefix(config('laravel-eskiz.route_prefix'))->group(function (){
    Route::post('send', [LaravelEskiz::class, 'send'])->name('send');
});

Route::name('eskizsms.')->prefix(config('laravel-eskiz.admin_route_prefix'))->middleware(config('laravel-eskiz.admin_middleware'))->group(function (){
    Route::any('dashboard', [LaravelEskiz::class, 'dashboard'])->name('dashboard');
    Route::any('listing', [LaravelEskiz::class, 'listing'])->name('listing');
    Route::any('config', [LaravelEskiz::class, 'config'])->name('config');
    Route::any('sender', [LaravelEskiz::class, 'sender'])->name('sender');
});


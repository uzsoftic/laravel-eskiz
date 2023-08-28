<?php
use Illuminate\Support\Facades\Route;

Route::name('eskizsms.')->prefix('eskiz-sms')->group(function (){
    Route::post('/send', [\Uzsoftic\LaravelEskiz\LaravelEskiz::class, 'send'])->name('send');

    Route::middleware(config('laravel-eskiz.admin_middleware'))->group(function (){
        Route::post(config('laravel-eskiz.admin_route'), [\Uzsoftic\LaravelEskiz\LaravelEskiz::class, 'send'])->name('panel');
    });
});


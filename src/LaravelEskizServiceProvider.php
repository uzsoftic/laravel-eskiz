<?php

namespace Uzsoftic\LaravelEskiz;

use Illuminate\Support\ServiceProvider;

class LaravelEskizServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'uzsoftic');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'uzsoftic');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes.php');

        $this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/laravel-eskiz'),
        ], 'laravel-eskiz.public');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-eskiz.php', 'laravel-eskiz');

        // Register the service the package provides.
        $this->app->singleton('laravel-eskiz', function ($app) {
            return new LaravelEskiz;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravel-eskiz'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/laravel-eskiz.php' => config_path('laravel-eskiz.php'),
        ], 'laravel-eskiz.config');

        // Publishing the views.
        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/laravel-eskiz'),
        ], 'laravel-eskiz.views');

        // Publishing assets.
        $this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/laravel-eskiz'),
        ], 'laravel-eskiz.assets');

        // Migrations
        $this->publishes([
            __DIR__.'/../database/migrations' => base_path('database/migrations'),
        ], 'laravel-eskiz.migrations');

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/uzsoftic'),
        ], 'laravel-eskiz.lang');*/

        // Registering package commands.
        // $this->commands([]);
    }
}

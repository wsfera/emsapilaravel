<?php

namespace Wsfera\EmsApiLaravel;

use Illuminate\Support\ServiceProvider;

class EmsApiLaravelServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'wsfera');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'wsfera');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

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
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/emsapilaravel.php', 'emsapilaravel');

        // Register the service the package provides.
        $this->app->singleton('emsapilaravel', function ($app) {
            return new EmsApiLaravel;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['emsapilaravel'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/emsapilaravel.php' => config_path('emsapilaravel.php'),
        ], 'emsapilaravel.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/wsfera'),
        ], 'emsapilaravel.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/wsfera'),
        ], 'emsapilaravel.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/wsfera'),
        ], 'emsapilaravel.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}

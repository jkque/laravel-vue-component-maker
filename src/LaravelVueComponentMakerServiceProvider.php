<?php

namespace Jkque\LaravelVueComponentMaker;

use Illuminate\Support\ServiceProvider;
use Jkque\LaravelVueComponentMaker\Commands\LaravelVueComponentMakerCommand;

class LaravelVueComponentMakerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/vue-component.php' => config_path('laravel-vue-component-maker.php'),
            ], 'vue-component');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/laravel-vue-component-maker'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/laravel-vue-component-maker'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/laravel-vue-component-maker'),
            ], 'lang');*/

            // Registering package commands.
            $this->commands([
                LaravelVueComponentMakerCommand::class
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/vue-component.php', 'laravel-vue-component-maker');

        // Register the main class to use with the facade
        $this->app->singleton('laravel-vue-component-maker', function () {
            return new LaravelVueComponentMaker;
        });
    }
}

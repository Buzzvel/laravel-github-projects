<?php

namespace Buzzvel\LaravelGithubProjects;

use Illuminate\Support\ServiceProvider;

class LaravelGithubProjectsServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'buzzvel');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'buzzvel');
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
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-github-projects.php', 'laravel-github-projects');

        // Register the service the package provides.
        $this->app->singleton('laravel-github-projects', function ($app) {
            return new LaravelGithubProjects;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravel-github-projects'];
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
            __DIR__.'/../config/laravel-github-projects.php' => config_path('laravel-github-projects.php'),
        ], 'laravel-github-projects.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/buzzvel'),
        ], 'laravel-github-projects.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/buzzvel'),
        ], 'laravel-github-projects.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/buzzvel'),
        ], 'laravel-github-projects.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}

<?php

namespace Arcanely\Editor;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class EditorServiceProvider extends ServiceProvider
{

    /** @var string */
    private const CONFIG_FILE = __DIR__.'/../config/editor.php';

    /** @var string */
    private const PATH_VIEWS = __DIR__.'/../resources/views/components';
    private const PATH_BLOCK_VIEWS = __DIR__.'/../resources/views/components/blocks';

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(): void
    {
        if (function_exists('config_path')) { // function not available and 'publish' not relevant in Lumen
            $this->publishes([
                self::CONFIG_FILE => config_path('editor.php'),
            ], 'config');
        }

        $this->publishes([
            __DIR__.'/../public' => public_path('arcanely/editor'),
        ], 'public');

        // Load the components
        $this->loadViewsFrom(self::PATH_VIEWS, 'arcanely');
        // $this->loadViewsFrom(self::PATH_BLOCK_VIEWS, 'arcanely-editor-blocks');
        Blade::componentNamespace('Arcanely\\Editor\\View\\Components', 'arcanely');
        // Blade::componentNamespace('Arcanely\\Editor\\View\\Components\\Blocks', 'arcanely-editor-blocks');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(self::CONFIG_FILE, 'editor');

        $this->app->singleton('editor', function () {
            return new Editor;
        });
    }




    /**
     * Bootstrap the application services.
     */
    // public function boot()
    // {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'editor');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'editor');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // if ($this->app->runningInConsole()) {
            // $this->publishes([
                // __DIR__.'/../config/config.php' => config_path('editor.php'),
            // ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/editor'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/editor'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/editor'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        // }
    // }

    /**
     * Register the application services.
     */
    // public function register()
    // {
        // Automatically apply the package configuration
        // $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'editor');

        // Register the main class to use with the facade
        // $this->app->singleton('editor', function () {
            // return new Editor;
        // });
    // }
}

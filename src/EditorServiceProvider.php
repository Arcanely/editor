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

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(): void
    {

        $this->publishes([
            self::CONFIG_FILE => config_path('editor.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../public' => public_path('/'),
        ], 'public');

        $this->publishes([
            __DIR__.'/../resources/assets' => resource_path('/assets/arcanely/editor'),
        ], 'src-assets');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/editor'),
        ], 'views');

        // Load the components
        $this->loadViewsFrom(self::PATH_VIEWS, 'arcanely');
        Blade::componentNamespace('Arcanely\\Editor\\View\\Components', 'arcanely');

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

}

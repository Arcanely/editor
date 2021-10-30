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

        $this->publishes([
            __DIR__.'/../resources' => resource_path('arcanely/editor'),
        ], 'resources');

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

}

<?php

namespace Litecms\Pricelist\Providers;

use Illuminate\Support\ServiceProvider;

class PricelistServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Load view
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'pricelist');

        // Load translation
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'pricelist');

        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        // Call pblish redources function
        $this->publishResources();

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/config.php', 'litecms.pricelist');

        // Bind facade
        $this->app->bind('litecms.pricelist', function ($app) {
            return $this->app->make('Litecms\Pricelist\Pricelist');
        });

        // Bind PriceList to repository
        $this->app->bind(
            'Litecms\Pricelist\Interfaces\PriceListRepositoryInterface',
            \Litecms\Pricelist\Repositories\Eloquent\PriceListRepository::class
        );

        $this->app->register(\Litecms\Pricelist\Providers\AuthServiceProvider::class);

        $this->app->register(\Litecms\Pricelist\Providers\RouteServiceProvider::class);

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['litecms.pricelist'];
    }

    /**
     * Publish resources.
     *
     * @return void
     */
    private function publishResources()
    {
        // Publish configuration file
        $this->publishes([__DIR__ . '/../../config/config.php' => config_path('litecms/pricelist.php')], 'config');

        // Publish admin view
        $this->publishes([__DIR__ . '/../../resources/views' => base_path('resources/views/vendor/pricelist')], 'view');

        // Publish language files
        $this->publishes([__DIR__ . '/../../resources/lang' => base_path('resources/lang/vendor/pricelist')], 'lang');

        // Publish public files and assets.
        $this->publishes([__DIR__ . '/public/' => public_path('/')], 'public');
    }
}

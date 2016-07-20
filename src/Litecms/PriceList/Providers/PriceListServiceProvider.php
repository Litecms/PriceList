<?php

namespace Litecms\PriceList\Providers;

use Illuminate\Support\ServiceProvider;

class PriceListServiceProvider extends ServiceProvider
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
        $this->loadViewsFrom(__DIR__ . '/../../../../resources/views', 'pricelist');

        // Load translation
        $this->loadTranslationsFrom(__DIR__ . '/../../../../resources/lang', 'pricelist');

        // Call pblish redources function
        $this->publishResources();

        include __DIR__ . '/../Http/routes.php';
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Bind facade
        $this->app->bind('pricelist', function ($app) {
            return $this->app->make('Litecms\PriceList\PriceList');
        });

        // Bind PriceList to repository
        $this->app->bind(
            \Litecms\PriceList\Interfaces\PriceListRepositoryInterface::class,
            \Litecms\PriceList\Repositories\Eloquent\PriceListRepository::class
        );

        $this->app->register(\Litecms\PriceList\Providers\AuthServiceProvider::class);
        $this->app->register(\Litecms\PriceList\Providers\EventServiceProvider::class);
        $this->app->register(\Litecms\PriceList\Providers\RouteServiceProvider::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['pricelist'];
    }

    /**
     * Publish resources.
     *
     * @return void
     */
    private function publishResources()
    {
        // Publish configuration file
        $this->publishes([__DIR__ . '/../../../../config/config.php' => config_path('package/pricelist.php')], 'config');

        // Publish admin view
        $this->publishes([__DIR__ . '/../../../../resources/views' => base_path('resources/views/vendor/pricelist')], 'view');

        // Publish language files
        $this->publishes([__DIR__ . '/../../../../resources/lang' => base_path('resources/lang/vendor/pricelist')], 'lang');

        // Publish migrations
        $this->publishes([__DIR__ . '/../../../../database/migrations/' => base_path('database/migrations')], 'migrations');

        // Publish seeds
        $this->publishes([__DIR__ . '/../../../../database/seeds/' => base_path('database/seeds')], 'seeds');

        // Publish public
        $this->publishes([__DIR__ . '/../../../../public/' => public_path('/')], 'uploads');
    }
}

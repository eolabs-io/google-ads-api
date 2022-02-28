<?php

namespace EolabsIo\GoogleAdsApi;

use EolabsIo\GoogleAdsApi\Domain\Reporting\Command\AdInsightsCommand;
use EolabsIo\GoogleAdsApi\GoogleAdsApi;
use Illuminate\Support\ServiceProvider;
use EolabsIo\GoogleAdsApi\Domain\Reporting\Insights;
use EolabsIo\GoogleAdsApi\Domain\Reporting\Providers\ReportsServiceProvider;

class GoogleAdsApiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            if (GoogleAdsApi::$runsMigrations) {
                $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
            }

            $this->publishes([
                __DIR__.'/../database/migrations' => database_path('migrations/googleAdsApi'),
            ], 'google-ads-api-migrations');

            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('google-ads-api.php'),
            ], 'google-ads-api-config');

            // Registering package commands.
            $this->commands([
                AdInsightsCommand::class,
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'google-ads-api');

        $this->app->register(ReportsServiceProvider::class);

        // Register the main class to use with the facade
        $this->app->singleton(Insights::class, function () {
            return new Insights;
        });
    }
}

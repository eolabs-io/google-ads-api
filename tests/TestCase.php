<?php

namespace EolabsIo\GoogleAdsApi\Tests;

use Illuminate\Support\Facades\Event;
use Orchestra\Testbench\TestCase as Orchestra;
use EolabsIo\GoogleAdsApi\GoogleAdsApiServiceProvider;

abstract class TestCase extends Orchestra
{
    public $initialEvent;

    protected function setUp(): void
    {
        parent::setUp();

        $this->loadMigrationsFrom(realpath(dirname(__DIR__) .'/database/migrations'));

        $this->initialEvent = Event::getFacadeRoot();
        Event::fake();
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('google-ads-api.clientId', env('GOOGLE_ADS_API_CLIENT_ID'));
        $app['config']->set('google-ads-api.clientSecret', env('GOOGLE_ADS_API_CLIENT_SECRET'));
        $app['config']->set('google-ads-api.developerToken', env('GOOGLE_ADS_API_DEVELOPER_TOKEN'));
        $app['config']->set('google-ads-api.customerId', env('GOOGLE_ADS_API_CUSTOMER_ID'));
    }

    /**
     * Get package providers.  At a minimum this is the package being tested, but also
     * would include packages upon which our package depends, e.g. Cartalyst/Sentry
     * In a normal app environment these would be added to the 'providers' array in
     * the config/app.php file.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            GoogleAdsApiServiceProvider::class,
        ];
    }
    /**
     * Get package aliases.  In a normal app environment these would be added to
     * the 'aliases' array in the config/app.php file.  If your package exposes an
     * aliased facade, you should add the alias here, along with aliases for
     * facades upon which your package depends, e.g. Cartalyst/Sentry.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    // protected function getPackageAliases($app)
    // {
    //     return [
    //         // 'Sentry' => 'Cartalyst\Sentry\Facades\Laravel\Sentry',
    //     ];
    // }
}

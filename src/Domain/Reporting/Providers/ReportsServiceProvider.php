<?php

namespace EolabsIo\GoogleAdsApi\Domain\Reporting\Providers;

use EolabsIo\GoogleAdsApi\Domain\Reporting\Events\FetchAdInsights;
use EolabsIo\GoogleAdsApi\Domain\Reporting\Listeners\FetchAdInsightsListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class ReportsServiceProvider extends ServiceProvider
{
    protected $listen = [
        FetchAdInsights::class => [
            FetchAdInsightsListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}

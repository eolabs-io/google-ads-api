<?php

namespace EolabsIo\GoogleAdsApi\Domain\Reporting\Listeners;

use EolabsIo\GoogleAdsApi\Domain\Reporting\Events\FetchAdInsights;
use EolabsIo\GoogleAdsApi\Domain\Reporting\Jobs\PerformFetchAdInsights;

class FetchAdInsightsListener
{
    public function handle(FetchAdInsights $event)
    {
        $insights = $event->insights;
        PerformFetchAdInsights::dispatch($insights)->onQueue('ad-insights');
    }
}

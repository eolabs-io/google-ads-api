<?php

namespace EolabsIo\GoogleAdsApi\Domain\Reporting;

use EolabsIo\GoogleAdsApi\Domain\Reporting\ReportCore;
use EolabsIo\GoogleAdsApi\Domain\Reporting\Concerns\InteractsWithInsights;

class Insights extends ReportCore
{
    use InteractsWithInsights;

    public function getEndpoint(): string
    {
        $apiVersion = $this->getApiVersion();
        $customerId = $this->getCustomerId();

        return "/{$apiVersion}/customers/{$customerId}/googleAds:searchStream";
    }

    public function getParameters(): array
    {
        return array_merge(
            $this->getInsightsParameters(),
        );
    }

    public function getCustomerId()
    {
        return config('google-ads-api.customerId');
    }
}

<?php

namespace EolabsIo\GoogleAdsApi\Tests\Concerns;

use EolabsIo\GoogleAdsApi\Support\Facades\GoogleAdsApiInsights;
use EolabsIo\GoogleAdsApi\Tests\Factories\GoogleAdsApiInsightsFactory;

trait CreatesAdInsights
{
    public function createAdInsights()
    {
        GoogleAdsApiInsightsFactory::new()->fakeInsightsResponse();

        return GoogleAdsApiInsights::withInsightsKeywordYesterdayQuery();
    }
}

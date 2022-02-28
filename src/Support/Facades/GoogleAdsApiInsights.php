<?php

namespace EolabsIo\GoogleAdsApi\Support\Facades;

use Illuminate\Support\Facades\Facade;
use EolabsIo\GoogleAdsApi\Domain\Reporting\Insights;

/**
 * @see EolabsIo\GoogleAdsApi\Domain\Reporting\Insights
 */
class GoogleAdsApiInsights extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Insights::class;
    }
}

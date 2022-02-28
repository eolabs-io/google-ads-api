<?php

namespace EolabsIo\GoogleAdsApi\Domain\Reporting\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use EolabsIo\GoogleAdsApi\Domain\Reporting\Insights;

class FetchAdInsights
{
    use Dispatchable, SerializesModels;

    /** @var EolabsIo\GoogleAdsApi\Domain\Reporting\Insights */
    public $insights;

    public function __construct(Insights $insights)
    {
        $this->insights = $insights;
    }
}

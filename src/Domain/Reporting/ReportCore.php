<?php

namespace EolabsIo\GoogleAdsApi\Domain\Reporting;

use EolabsIo\GoogleAdsApi\Domain\Shared\GoogleAdsApiCore;

abstract class ReportCore extends GoogleAdsApiCore
{
    public function getApiVersion(): string
    {
        return 'v10';
    }
}

<?php

namespace EolabsIo\GoogleAdsApi\Tests\Unit\Reports;

use EolabsIo\GoogleAdsApi\Tests\Unit\BaseModelTest;
use EolabsIo\GoogleAdsApi\Domain\Reporting\Models\CostInsight;

class CostInsightTest extends BaseModelTest
{
    protected function getModelClass()
    {
        return CostInsight::class;
    }
}

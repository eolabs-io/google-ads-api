<?php

namespace EolabsIo\GoogleAdsApi\Tests\Unit\Shared;

use EolabsIo\GoogleAdsApi\Tests\Unit\BaseModelTest;
use EolabsIo\GoogleAdsApi\Domain\Shared\Models\Campaign;

class CampaignTest extends BaseModelTest
{
    protected function getModelClass()
    {
        return Campaign::class;
    }
}

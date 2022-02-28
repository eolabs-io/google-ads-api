<?php

namespace EolabsIo\GoogleAdsApi\Tests\Unit\Shared;

use EolabsIo\GoogleAdsApi\Tests\Unit\BaseModelTest;
use EolabsIo\GoogleAdsApi\Domain\Shared\Models\AdGroup;

class AdGroupTest extends BaseModelTest
{
    protected function getModelClass()
    {
        return AdGroup::class;
    }
}

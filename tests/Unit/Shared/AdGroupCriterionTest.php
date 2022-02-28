<?php

namespace EolabsIo\GoogleAdsApi\Tests\Unit\Shared;

use EolabsIo\GoogleAdsApi\Tests\Unit\BaseModelTest;
use EolabsIo\GoogleAdsApi\Domain\Shared\Models\AdGroupCriterion;

class AdGroupCriterionTest extends BaseModelTest
{
    protected function getModelClass()
    {
        return AdGroupCriterion::class;
    }
}

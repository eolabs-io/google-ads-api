<?php

namespace EolabsIo\GoogleAdsApi\Tests\Unit;

use EolabsIo\GoogleAdsApi\Tests\Unit\BaseModelTest;
use EolabsIo\GoogleAdsApi\Domain\Shared\Models\GoogleAdsApiAuthorization;

class GoogleAdsApiAuthorizationTest extends BaseModelTest
{
    protected function getModelClass()
    {
        return GoogleAdsApiAuthorization::class;
    }
}

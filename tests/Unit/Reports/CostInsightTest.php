<?php

namespace EolabsIo\GoogleAdsApi\Tests\Unit\Reports;

use EolabsIo\GoogleAdsApi\Tests\Unit\BaseModelTest;
use EolabsIo\GoogleAdsApi\Domain\Reporting\Models\CostInsight;
use EolabsIo\GoogleAdsApi\Domain\Shared\Models\AdGroup;
use EolabsIo\GoogleAdsApi\Domain\Shared\Models\AdGroupCriterion;
use EolabsIo\GoogleAdsApi\Domain\Shared\Models\Campaign;

class CostInsightTest extends BaseModelTest
{
    protected function getModelClass()
    {
        return CostInsight::class;
    }

    /** @test */
    public function it_has_campaign_relationship()
    {
        $campaign = Campaign::factory()->create();
        $costInsight = CostInsight::factory()->create(['campaign_id' => $campaign->id]);

        $this->assertArraysEqual($campaign->toArray(), $costInsight->campaign->toArray());
    }

    /** @test */
    public function it_has_ad_group_relationship()
    {
        $adGroup = AdGroup::factory()->create();
        $costInsight = CostInsight::factory()->create(['ad_group_id' => $adGroup->id]);

        $this->assertArraysEqual($adGroup->toArray(), $costInsight->adGroup->toArray());
    }

    /** @test */
    public function it_has_ad_group_criterion_relationship()
    {
        $adGroupCriterion = AdGroupCriterion::factory()->create();
        $costInsight = CostInsight::factory()->create(['ad_group_criterion_id' => $adGroupCriterion->id]);

        $this->assertArraysEqual($adGroupCriterion->toArray(), $costInsight->adGroupCriterion->toArray());
    }
}

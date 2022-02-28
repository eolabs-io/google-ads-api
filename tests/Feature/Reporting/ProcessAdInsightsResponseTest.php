<?php

namespace EolabsIo\GoogleAdsApi\Tests\Feature\Reporting;

use EolabsIo\GoogleAdsApi\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use EolabsIo\GoogleAdsApi\Domain\Shared\Models\AdGroup;
use EolabsIo\GoogleAdsApi\Domain\Shared\Models\Campaign;
use EolabsIo\GoogleAdsApi\Tests\Concerns\CreatesAdInsights;
use EolabsIo\GoogleAdsApi\Domain\Reporting\Models\CostInsight;
use EolabsIo\GoogleAdsApi\Domain\Reporting\Jobs\ProcessAdInsightsResponse;
use EolabsIo\GoogleAdsApi\Domain\Shared\Models\AdGroupCriterion;

class ProcessAdInsightsResponseTest extends TestCase
{
    use RefreshDatabase,
        CreatesAdInsights;


    protected function setUp(): void
    {
        parent::setUp();

        $adInsights = $this->createAdInsights();
        $results = $adInsights->fetch();

        (new ProcessAdInsightsResponse($results))->handle();
    }

    /** @test */
    public function it_can_process_insights_response()
    {
        $costInsight = CostInsight::first();

        $this->assertEquals($costInsight->customer_id, '9718902249');
        $this->assertEquals($costInsight->campaign_id, '16037445769');
        $this->assertEquals($costInsight->ad_group_id, '131723824983');
        $this->assertEquals($costInsight->ad_group_criterion_id, '10663057');
        $this->assertEquals($costInsight->date, '2022-02-27 00:00:00');
        $this->assertEquals($costInsight->impressions, '671');
        $this->assertEquals($costInsight->clicks, '40');
        $this->assertEquals($costInsight->cost, '30.49');

        $this->assertCampaign();
        $this->assertAdGroup();
        $this->assertAdGroupCriterion();
    }

    public function assertCampaign()
    {
        $campaign = Campaign::first();

        $this->assertEquals($campaign->id, '12479526873');
        $this->assertEquals($campaign->name, 'Amazon Attribution Website traffic Search');
    }

    public function assertAdGroup()
    {
        $adGroup = AdGroup::first();

        $this->assertEquals($adGroup->id, '117821645446');
        $this->assertEquals($adGroup->name, 'Ad group - Mood Support Supplement - Exact');
    }

    public function assertAdGroupCriterion()
    {
        $adGroupCriterion = AdGroupCriterion::first();

        $this->assertEquals($adGroupCriterion->id, '10663057');
        $this->assertEquals($adGroupCriterion->keyword, 'probiotic');
    }
}

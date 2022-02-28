<?php

namespace EolabsIo\GoogleAdsApi\Tests\Feature\Reporting;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use EolabsIo\GoogleAdsApi\Tests\TestCase;
use EolabsIo\GoogleAdsApi\Support\Facades\GoogleAdsApiInsights;
use EolabsIo\GoogleAdsApi\Tests\Factories\GoogleAdsApiInsightsFactory;

class GoogleAdsApiInsightsTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function it_sends_the_correct_request_query()
    {
        GoogleAdsApiInsightsFactory::new()->fakeInsightsResponse();

        $since = Carbon::create(2022, 2, 22);
        $until = Carbon::create(2022, 2, 23);


        GoogleAdsApiInsights::withInsightsKeywordYesterdayQuery()
            ->fetch();

        Http::assertSent(function ($request) {
            return Str::startsWith($request->url(), "https://googleads.googleapis.com/v10/customers/9876543210/googleAds:searchStream") &&
                    $request->method() == "POST" &&
            // headers
                    $request->hasHeader('developer-token', '987654321') &&
            // parameters
                    Str::startsWith($request['query'], "SELECT");
        });
    }

    /** @test */
    public function it_gets_the_correct_response()
    {
        GoogleAdsApiInsightsFactory::new()->fakeInsightsResponse();

        $response = GoogleAdsApiInsights::withInsightsKeywordYesterdayQuery()
                        ->fetch();

        $results = data_get($response, '0.results');

        $this->assertCount(25, $results);

        $result = $results[0];

        $this->assertEquals('9718902249', data_get($result, 'customer.id'));
        $this->assertEquals('16037445769', data_get($result, 'campaign.id'));
        $this->assertEquals('131723824983', data_get($result, 'adGroup.id'));
        $this->assertEquals('10663057', data_get($result, 'adGroupCriterion.criterionId'));
        $this->assertEquals('30490000', data_get($result, 'metrics.costMicros'));
    }
}

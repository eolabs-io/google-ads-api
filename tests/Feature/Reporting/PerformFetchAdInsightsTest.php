<?php

namespace EolabsIo\GoogleAdsApi\Tests\Feature\Reporting;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Queue;
use EolabsIo\GoogleAdsApi\Tests\TestCase;
use EolabsIo\GoogleAdsApi\Tests\Concerns\CreatesAdInsights;
use EolabsIo\GoogleAdsApi\Domain\Reporting\Events\FetchAdInsights;
use EolabsIo\GoogleAdsApi\Domain\Reporting\Jobs\PerformFetchAdInsights;
use EolabsIo\GoogleAdsApi\Domain\Reporting\Jobs\ProcessAdInsightsResponse;

class PerformFetchAdInsightsTest extends TestCase
{
    use CreatesAdInsights;

    protected function setUp(): void
    {
        parent::setUp();

        Queue::fake();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /** @test */
    public function it_calls_the_correct_job()
    {
        $adInsights = $this->createAdInsights();

        PerformFetchAdInsights::dispatch($adInsights);

        // Assert a job was pushed...
        Queue::assertPushed(PerformFetchAdInsights::class, function ($job) {
            $job->handle();
            return true;
        });

        // Assert a job was pushed...
        Queue::assertPushed(ProcessAdInsightsResponse::class, function ($job) {
            return data_get($job->results, '0.results.0.campaign.id') === '16037445769';
        });

        // Assert that was not called for Cursor
        Event::assertNotDispatched(FetchAdInsights::class);
    }
}

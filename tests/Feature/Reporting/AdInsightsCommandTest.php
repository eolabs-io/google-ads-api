<?php

namespace EolabsIo\GoogleAdsApi\Tests\Feature\Reporting;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Queue;
use EolabsIo\GoogleAdsApi\Tests\TestCase;
use EolabsIo\GoogleAdsApi\Domain\Reporting\Events\FetchAdInsights;

class AdInsightsCommandTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Queue::fake();
    }

    /** @test */
    public function it_can_execute_performance_report_artisan_command()
    {
        $this->artisan('google-ads-api:ad-insights
                --start-date=2022-02-1
                --end-date=2022-02-14
                ')
             ->assertExitCode(0);

        // Assert that job was called
        Event::assertDispatched(FetchAdInsights::class);
    }
}

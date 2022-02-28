<?php

namespace EolabsIo\GoogleAdsApi\Domain\Reporting\Command;

use Illuminate\Support\Carbon;
use Illuminate\Console\Command;
use EolabsIo\GoogleAdsApi\Support\Facades\GoogleAdsApiInsights;
use EolabsIo\GoogleAdsApi\Domain\Reporting\Events\FetchAdInsights;

class AdInsightsCommand extends Command
{
    protected $signature = 'google-ads-api:ad-insights
                            {--date-preset-yesterday : Get resutls from yesterday.}
                            {--end-date= : The end date for the report.}
                            {--start-date= : The start date for the report.}';

    protected $description = 'Gets Ad Insight Report from Google Ads API';


    public function handle()
    {
        $this->info('Getting Ad Insight Report from Google Ads API...');

        $datePresetYesterday = $this->option('date-preset-yesterday');
        $endDate = Carbon::create($this->option('end-date'));
        $startDate = Carbon::create($this->option('start-date'));

        // Apply date range
        $googleAdsApiInsights = ($datePresetYesterday)
            ? GoogleAdsApiInsights::withInsightsKeywordYesterdayQuery()
            : GoogleAdsApiInsights::withInsightsKeywordDateRangeQuery($startDate, $endDate);

        FetchAdInsights::dispatch($googleAdsApiInsights);
    }
}

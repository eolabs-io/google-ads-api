<?php

namespace EolabsIo\GoogleAdsApi\Domain\Reporting\Concerns;

use Illuminate\Support\Carbon;

trait InteractsWithInsights
{
    /** @var array */
    private $insightsParameters = [];

    public function withInsightsKeywordYesterdayQuery(): self
    {
        $keywordQuery = $this->getKeywordQuery('DURING YESTERDAY');

        return $this->withInsightsQuery($keywordQuery);
    }

    public function withInsightsKeywordDateRangeQuery(Carbon $startDate, Carbon $endDate): self
    {
        $keywordQuery = $this->getKeywordQuery("BETWEEN '{$startDate->format('Y-m-d')}' AND '{$endDate->format('Y-m-d')}'");

        return $this->withInsightsQuery($keywordQuery);
    }

    public function withInsightsQuery(string $query): self
    {
        $this->insightsParameters['query'] = $query;

        return $this;
    }

    public function getInsightsParameters(): array
    {
        return $this->insightsParameters;
    }

    public function getKeywordQuery($dateRange = 'DURING LAST_30_DAYS'): string
    {
        return "SELECT campaign.id, campaign.name, campaign.status,
                        ad_group.id, ad_group.name,
                        ad_group_criterion.criterion_id, ad_group_criterion.keyword.text,
                        metrics.impressions, metrics.clicks, metrics.cost_micros,
                        customer.id,
                        segments.date
                FROM keyword_view
                WHERE segments.date {$dateRange} AND campaign.status = 'ENABLED'";
    }
}

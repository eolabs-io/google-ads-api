<?php

namespace EolabsIo\GoogleAdsApi\Domain\Reporting\Actions;

use Illuminate\Database\Eloquent\Model;
use EolabsIo\GoogleAdsApi\Domain\Shared\Models\Campaign;
use EolabsIo\GoogleAdsApi\Domain\Reporting\Models\CostInsight;
use EolabsIo\GoogleAdsApi\Domain\Shared\Actions\BasePersistAction;
use EolabsIo\GoogleAdsApi\Domain\Shared\Models\AdGroup;
use EolabsIo\GoogleAdsApi\Domain\Shared\Models\AdGroupCriterion;

class PersistAdInsightsAction extends BasePersistAction
{
    private $moneyMicros = 1000000;

    public function getKey(): string
    {
        return '0.results';
    }

    protected function createItem($list): Model
    {
        $values = [
            'customer_id' => data_get($list, 'customer.id'),
            'campaign_id' => data_get($list, 'campaign.id'),
            'ad_group_id' => data_get($list, 'adGroup.id'),
            'ad_group_criterion_id' => data_get($list, 'adGroupCriterion.criterionId'),
            'date' => data_get($list, 'segments.date'),
            'impressions' => data_get($list, 'metrics.impressions'),
            'clicks' => data_get($list, 'metrics.clicks'),
            'cost' => data_get($list, 'metrics.costMicros', 0) / $this->moneyMicros,
        ];

        $attributes = [
            'customer_id' => data_get($values, 'customer_id'),
            'campaign_id' => data_get($values, 'campaign_id'),
            'ad_group_id' => data_get($values, 'ad_group_id'),
            'ad_group_criterion_id' => data_get($values, 'ad_group_criterion_id'),
            'date' => data_get($values, 'date'),
        ];

        $costInsight = CostInsight::updateOrCreate($attributes, $values);

        $this->associateCampaign(data_get($list, 'campaign'));
        $this->associateAdGroup(data_get($list, 'adGroup'));
        $this->associateAdGroupCriterion(data_get($list, 'adGroupCriterion'));

        return $costInsight;
    }

    public function associateCampaign($list)
    {
        $values = [
            'id' => data_get($list, 'id'),
            'name' => data_get($list, 'name'),
        ];
        $attributes = $values;

        Campaign::firstOrCreate($attributes, $values);
    }

    public function associateAdGroup($list)
    {
        $values = [
            'id' => data_get($list, 'id'),
            'name' => data_get($list, 'name'),
        ];
        $attributes = $values;

        AdGroup::firstOrCreate($attributes, $values);
    }

    public function associateAdGroupCriterion($list)
    {
        $values = [
            'id' => data_get($list, 'criterionId'),
            'keyword' => data_get($list, 'keyword.text'),
        ];
        $attributes = $values;

        AdGroupCriterion::firstOrCreate($attributes, $values);
    }
}

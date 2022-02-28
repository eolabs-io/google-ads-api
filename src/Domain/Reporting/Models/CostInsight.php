<?php

namespace EolabsIo\GoogleAdsApi\Domain\Reporting\Models;

use EolabsIo\GoogleAdsApi\Database\Factories\CostInsightFactory;
use EolabsIo\GoogleAdsApi\Domain\Shared\Models\AdGroup;
use EolabsIo\GoogleAdsApi\Domain\Shared\Models\AdGroupCriterion;
use EolabsIo\GoogleAdsApi\Domain\Shared\Models\Campaign;
use EolabsIo\GoogleAdsApi\Domain\Shared\Models\GoogleAdsApiModel;

class CostInsight extends GoogleAdsApiModel
{

        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'google_cost_insights';

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'date',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                    'customer_id',
                    'campaign_id',
                    'ad_group_id',
                    'ad_group_criterion_id',
                    'date',
                    'impressions',
                    'clicks',
                    'cost',
                ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class)->withDefault();
    }

    public function adGroup()
    {
        return $this->belongsTo(AdGroup::class)->withDefault();
    }

    public function adGroupCriterion()
    {
        return $this->belongsTo(AdGroupCriterion::class)->withDefault();
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public static function newFactory()
    {
        return CostInsightFactory::new();
    }
}

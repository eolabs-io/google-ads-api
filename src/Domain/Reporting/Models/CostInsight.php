<?php

namespace EolabsIo\GoogleAdsApi\Domain\Reporting\Models;

use EolabsIo\GoogleAdsApi\Database\Factories\CostInsightFactory;
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

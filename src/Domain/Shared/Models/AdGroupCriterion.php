<?php

namespace EolabsIo\GoogleAdsApi\Domain\Shared\Models;

use EolabsIo\GoogleAdsApi\Database\Factories\AdGroupCriterionFactory;
use EolabsIo\GoogleAdsApi\Domain\Shared\Models\GoogleAdsApiModel;

class AdGroupCriterion extends GoogleAdsApiModel
{
    public $incrementing = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'google_ad_group_criterions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                    'id',
                    'keyword',
                ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public static function newFactory()
    {
        return AdGroupCriterionFactory::new();
    }
}

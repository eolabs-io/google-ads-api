<?php

namespace EolabsIo\GoogleAdsApi\Domain\Shared\Models;

use EolabsIo\GoogleAdsApi\Database\Factories\AdGroupFactory;

class AdGroup extends GoogleAdsApiModel
{
    public $incrementing = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'google_ad_groups';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                    'id',
                    'name',
                ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public static function newFactory()
    {
        return AdGroupFactory::new();
    }
}

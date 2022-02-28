<?php

namespace EolabsIo\GoogleAdsApi\Domain\Shared\Models;

use EolabsIo\GoogleAdsApi\Domain\Shared\Models\GoogleAdsApiModel;
use EolabsIo\GoogleAdsApi\Database\Factories\GoogleAdsApiAuthorizationFactory;

class GoogleAdsApiAuthorization extends GoogleAdsApiModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'google_ads_api_authorizations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                    'client_id',
                    'refresh_token',
                ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public static function newFactory()
    {
        return GoogleAdsApiAuthorizationFactory::new();
    }
}

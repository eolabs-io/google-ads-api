<?php

namespace EolabsIo\GoogleAdsApi\Tests\Factories;

use Illuminate\Support\Facades\Http;
use EolabsIo\GoogleAdsApi\Tests\Factories\TokenProviderFactory;
use EolabsIo\GoogleAdsApi\Domain\Shared\Models\GoogleAdsApiAuthorization;

class GoogleAdsApiInsightsFactory
{
    private $endpoint = 'googleads.googleapis.com/v10/customers/9876543210/googleAds:searchStream';

    public static function new(): self
    {
        return new static();
    }

    public function fake(): self
    {
        Http::fake();

        return $this;
    }

    public function fakeInsightsResponse(): self
    {
        $this->fakeTokenProvider();

        $file = __DIR__ . '/../Stubs/Responses/fetchGoogleAdsApiInsightsResponse.json';
        $response = file_get_contents($file);

        Http::fake([
             $this->endpoint. '*' => Http::sequence()
                                    ->push($response, 200)
                                    ->whenEmpty(Http::response('', 404)),
        ]);

        return $this;
    }

    public function fakeTokenProvider()
    {
        GoogleAdsApiAuthorization::factory()->create([
            'client_id' =>  config('google-ads-api.clientId'),
        ]);

        TokenProviderFactory::new()->fakeRefreshTokenResponse();
    }
}

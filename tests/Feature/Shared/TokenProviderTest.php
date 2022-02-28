<?php

namespace EolabsIo\GoogleAdsApi\Tests\Feature\Shared;

use Illuminate\Support\Facades\Http;
use EolabsIo\GoogleAdsApi\Tests\TestCase;
use EolabsIo\GoogleAdsApi\Domain\Shared\TokenProvider;
use EolabsIo\GoogleAdsApi\Tests\Factories\TokenProviderFactory;
use EolabsIo\GoogleAdsApi\Domain\Shared\Models\GoogleAdsApiAuthorization;

class TokenProviderTest extends TestCase
{
    private $googleAdsApiAuthorization;

    protected function setUp(): void
    {
        parent::setUp();

        $this->googleAdsApiAuthorization = GoogleAdsApiAuthorization::factory()->create([
            'client_id' => config('google-ads-api.clientId'),
        ]);

        TokenProviderFactory::new()->fakeRefreshTokenResponse();
    }

    /** @test */
    public function it_sends_the_correct_request_query()
    {
        $tokenProvider = new TokenProvider();

        $accessToken = $tokenProvider->getAccessToken();

        Http::assertSent(function ($request) {
            return $request->url() == "https://oauth2.googleapis.com/token" &&
                   $request['refresh_token'] == $this->googleAdsApiAuthorization->refresh_token &&
                   $request['grant_type'] == 'refresh_token' &&
                   $request['client_id'] == '123459541998-prerumfquEXAMPLEofjd7c.apps.googleusercontent.com' &&
                   $request['client_secret'] == 'EXAMPLE0b302baf3e644a2baf3e62baf3e';
        });

        $this->assertEquals('ya29.p5vkur2-EXAMPLE-zmtUiHIX2Lj9DFhNGw-bp5G1eTO5vZUM4tDJpG_u0ARrdaM97iZLeq8PM0R0ARAg', $accessToken);
    }
}

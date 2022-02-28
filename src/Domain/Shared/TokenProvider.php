<?php

namespace EolabsIo\GoogleAdsApi\Domain\Shared;

use Exception;
use Illuminate\Support\Facades\Http;
use EolabsIo\GoogleAdsApi\Domain\Shared\Models\GoogleAdsApiAuthorization;

class TokenProvider
{
    private $endpoint = "https://oauth2.googleapis.com/token";

    private function getRefreshToken(): string
    {
        $clientId = config('google-ads-api.clientId');

        $googleAdsApiAuthorization = GoogleAdsApiAuthorization::whereClientId($clientId)->first();

        return $googleAdsApiAuthorization->refresh_token;
    }

    public function getAccessToken(): string
    {
        try {
            $parameters = [
                'refresh_token' => $this->getRefreshToken(),
                'grant_type' => 'refresh_token',
                'client_id' => config('google-ads-api.clientId'),
                'client_secret' => config('google-ads-api.clientSecret'),
            ];

            $response = Http::post($this->endpoint, $parameters)->throw();
        } catch (Exception $exception) {
            // Handle exception
        }

        return $response['access_token'];
    }
}

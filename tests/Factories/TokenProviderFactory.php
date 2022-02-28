<?php

namespace EolabsIo\GoogleAdsApi\Tests\Factories;

use Illuminate\Support\Facades\Http;

class TokenProviderFactory
{
    private $endpoint = 'https://oauth2.googleapis.com/token';

    public static function new(): self
    {
        return new static();
    }

    public function fake(): self
    {
        Http::fake();

        return $this;
    }

    public function fakeRefreshTokenResponse(): self
    {
        $file = __DIR__ . '/../Stubs/Responses/RefreshTokenResponse.json';
        $response = file_get_contents($file);

        Http::fake([
             $this->endpoint => Http::sequence()
                                    ->push($response, 200)
                                    ->push($response, 200)
                                    ->whenEmpty(Http::response('', 404)),
        ]);

        return $this;
    }
}

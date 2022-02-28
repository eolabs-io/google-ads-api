<?php

namespace EolabsIo\GoogleAdsApi\Domain\Shared;

use Illuminate\Support\Collection;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;
use EolabsIo\GoogleAdsApi\Domain\Shared\TokenProvider;
use EolabsIo\GoogleAdsApi\Support\Concerns\Methodable;

abstract class GoogleAdsApiCore
{
    use Methodable;

    /** @var Illuminate\Http\Client\Response */
    private $response;

    /** @var Illuminate\Support\Collection */
    private $results;

    /**
     * @var TokenProvider
     */
    protected $tokenProvider;


    public function __construct()
    {
        $this->tokenProvider = new TokenProvider();
        $this->results = new Collection();
    }

    public function beforeFetch()
    {
    }

    public function fetch()
    {
        $this->beforeFetch();

        $headers = $this->getHeaders();
        $baseUrl = $this->getBaseUrl();
        $endpoint = $this->getEndpoint();
        $data = $this->getParameters();
        $method = $this->getMethod();

        try {
            $response = Http::withHeaders($headers)
                            ->baseUrl($baseUrl)
                            ->{$method}($endpoint, $data)
                            ->throw();
        } catch (\Exception $exception) {
            // handle exception
            $this->handleException($exception);
        }

        return $this->processResponse($response);
    }

    protected function getHeaders(array $headers = []): array
    {
        $auth = [];
        if ($this->tokenProvider) {
            $auth = $this->getHeadersForBearerToken($this->tokenProvider->getAccessToken());
        }

        $developerTokenHeader = $this->getHeadersForDeveloperToken();

        return array_merge($auth, $developerTokenHeader, $headers);
    }

    public function getBaseUrl(): string
    {
        return 'https://googleads.googleapis.com';
    }

    abstract public function getEndpoint(): string;

    public function getParameters(): array
    {
        return [];
    }

    /**
     * @return array
     */
    protected function getHeadersForBearerToken($token)
    {
        return [
            'Authorization' => "Bearer {$token}",
        ];
    }

    /**
     * @return array
     */
    protected function getHeadersForDeveloperToken()
    {
        return [
            'developer-token' => config('google-ads-api.developerToken'),
        ];
    }

    public function handleException(RequestException $requestException)
    {
        throw $requestException;
    }

    public function processResponse(Response $response)
    {
        $this->response = $response;

        $resultsFromResponse = $this->getResultsFromResponse($response);

        $this->results = $this->parseResults($resultsFromResponse);

        return $this->getResults();
    }

    public function getResultsFromResponse(Response $response): Collection
    {
        return $response->collect();
    }

    public function parseResults(Collection $results): Collection
    {
        return $results;
    }

    public function getResults()
    {
        return $this->results;
    }
}

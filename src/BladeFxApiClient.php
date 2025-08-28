<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class BladeFxApiClient
{
    protected const string API_AUTH = 'api/users/authenticate';

    /**
     * @param HttpClientInterface $httpClient
     * @param string $bladeFxBaseUrl
     * @param string $bladeFxUsername
     * @param string $bladeFxPassword
     */
    public function __construct(
        protected HttpClientInterface $httpClient,
        protected string $bladeFxBaseUrl,
        protected string $bladeFxUsername,
        protected string $bladeFxPassword)
    {
    }


    /**
     * @return string|null
     */
    public function getBearerToken(): ?string
    {
        $authUrl = $this->bladeFxBaseUrl . static::API_AUTH;

        $authResponse = $this->httpClient->request('POST', $authUrl, [
            'json' => [
                'username' => $this->bladeFxUsername,
                'password' => $this->bladeFxPassword
            ]
        ]);

        $authResponseArray = $authResponse?->toArray();
        $bearerToken = $authResponseArray['token'] ?? null;

        return $bearerToken;
    }

}
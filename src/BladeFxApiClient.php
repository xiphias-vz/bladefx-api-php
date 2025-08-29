<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi;

use Psr\Log\LoggerInterface;
use Psr\SimpleCache\CacheInterface;
use Symfony\Contracts\HttpClient\Exception\HttpExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class BladeFxApiClient
{
    protected const string API_AUTH = 'api/users/authenticate';

    protected const string KEY_TOKEN = 'token';

    /**
     * @param HttpClientInterface $httpClient
     * @param string $bladeFxBaseUrl
     * @param string $bladeFxUsername
     * @param string $bladeFxPassword
     * @param CacheInterface|null $cache
     */
    public function __construct(
        protected HttpClientInterface $httpClient,
        protected string              $bladeFxBaseUrl,
        protected string              $bladeFxUsername,
        protected string              $bladeFxPassword,
        protected ?LoggerInterface $logger = null,
    )
    {
    }

    /**
     * @return string|null
     */
    public function getBearerToken(): ?string
    {
        $authUrl = $this->bladeFxBaseUrl . static::API_AUTH;

        try {
            $response = $this->httpClient->request('POST', $authUrl, [
                'json' => [
                    BladeFxApiConstants::KEY_USERNAME => $this->bladeFxUsername,
                    BladeFxApiConstants::KEY_PASSWORD => $this->bladeFxPassword
                ]
            ]);

            try {
                $content = $response->getContent();
            } catch (HttpExceptionInterface $e) {
                $this->logger?->error('BladeFX API returned exception', ['exception' => $e->getMessage()]);
                return null;
            }

            $data = json_decode($content, true);
            if(!isset($data[static::KEY_TOKEN])) {
                $this->logger?->error('BladeFX API did not return a token', ['response' => $data]);
            }

            return $data[static::KEY_TOKEN] ?? null;
        } catch (\Exception|TransportExceptionInterface $e) {
            $this->logger?->error('Unexpected error when calling BladeFX API', [
                'exception' => $e,
                'url' => $authUrl,
            ]);
            return null;
        }

    }
}
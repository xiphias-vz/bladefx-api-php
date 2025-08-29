<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi;

use Psr\Log\LoggerInterface;
use Psr\SimpleCache\CacheInterface;
use Symfony\Contracts\HttpClient\Exception\HttpExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Xiphias\BladeFxApi\Resources\CategoryList;
use Xiphias\BladeFxApi\Resources\ReportData\ReportData;
use Xiphias\BladeFxApi\Resources\ReportList;
use Xiphias\BladeFxApi\Resources\ReportParams;

class BladeFxApiClient
{
    protected const string API_AUTH = 'api/users/authenticate';
    protected const string API_GET_REPORT_LIST = 'api/ReportData/GetReportList';
    protected const string API_GET_REPORT_DATA = 'api/ReportData/GetReportData';
    protected const string API_GET_REPORT_PARAMS = 'api/ReportData/GetReportParams';


    protected const string API_GET_CATEGORY_LIST = 'api/ReportData/GetCategoryList';

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
        $authUrl = $this->getUrl(static::API_AUTH);

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

    /**
     * @param ReportList $reportList
     * @return string|null
     */
    public function getReportList(
        ReportList $reportList
    ): ?string
    {
        $bearerToken = $this->getBearerToken();
        $url = $this->getUrl(static::API_GET_REPORT_LIST);

        $response = $this->sendGetRequest($bearerToken, $url, $reportList);

        return '';
    }

    /**
     * @param ReportParams $reportParams
     * @return string|null
     */
    public function getReportParams(
        ReportParams $reportParams
    ): ?string
    {
        $bearerToken = $this->getBearerToken();
        $url = $this->getUrl(static::API_GET_REPORT_PARAMS);

        $response = $this->sendGetRequest($bearerToken, $url, $reportParams);

        return '';
    }

    public function getReportData(
        ReportData $reportData,
        object $body
    ): ?string
    {
        $bearerToken = $this->getBearerToken();
        $url = $this->getUrl(static::API_GET_REPORT_DATA);

        $response = $this->sendPostRequest($bearerToken, $url, $reportData, $body);

        return '';
    }

    /**
     * @return string|null
     */
    public function getCategoryList(
        CategoryList $categoryList
    ): ?string
    {
        $bearerToken = $this->getBearerToken();
        $url = $this->getUrl(static::API_GET_CATEGORY_LIST);

        $response = $this->sendGetRequest($bearerToken, $url, $categoryList);

        return '';
    }

    protected function getUrl(string $apiUrl): string
    {
        return $this->bladeFxBaseUrl . $apiUrl;
    }

    protected function sendGetRequest(string $bearerToken, string $url, object $params): array
    {
        $response = $this->httpClient->request(
            'GET',
            $url,
            [
                'headers' => [
                    'Authorization' => 'Bearer ' . $bearerToken,
                ],
                'query' => $this->buildQuery($params),
            ]
        );

        return $response?->toArray();
    }

    protected function sendPostRequest(string $bearerToken, string $url, object $params, object $body): array
    {
        $response = $this->httpClient->request(
            'POST',
            $url,
            [
                'headers' => [
                    'accept' => '*/*',
                    'Authorization' => 'Bearer ' . $bearerToken,
                    'Content-Type' => 'application/json',
                ],
                'query' => $this->buildQuery($params),
                'json' => $body,
            ]
        );

        return $response->toArray(false);
    }

    protected function buildQuery(object $params): array
    {
        $queryArray = [];

        foreach (get_object_vars($params) as $key => $value) {
            if ($value !== null) {
                if (is_bool($value)) {
                    $value = $value ? 'true' : 'false';
                }
                $queryArray[$key] = $value;
            }
        }

        return $queryArray;
    }
}

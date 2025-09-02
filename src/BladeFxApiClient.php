<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi;

use Psr\Log\LoggerInterface;
use Symfony\Contracts\HttpClient\Exception\HttpExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Xiphias\BladeFxApi\DTO\BladeFXCategoriesListResponseTransfer;
use Xiphias\BladeFxApi\DTO\ReportParamsDefTransfer;
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
    protected const string API_GET_REPORT_PREVIEW_URL = 'api/ReportData/GetReportPreviewURL';

    protected const string KEY_TOKEN = 'token';

    /**
     * @param HttpClientInterface $httpClient
     * @param string $bladeFxBaseUrl
     * @param string $bladeFxUsername
     * @param string $bladeFxPassword
     * @param LoggerInterface|null $logger
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
     * @param ReportList|null $reportList
     * @return string|null
     */
    public function getReportList(
        ?ReportList $reportList = (new ReportList())
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
        ReportParamsDefTransfer $body
    ): ?string
    {
        $bearerToken = $this->getBearerToken();
        $url = $this->getUrl(static::API_GET_REPORT_DATA);

        $response = $this->sendPostRequest($bearerToken, $url, $reportData, $body);

        return '';
    }

    /**
     * @param CategoryList|null $categoryList
     * @return BladeFXCategoriesListResponseTransfer
     */
    public function getCategoryList(
        ?CategoryList $categoryList = (new CategoryList())
    ): BladeFXCategoriesListResponseTransfer
    {
        $bearerToken = $this->getBearerToken();
        $url = $this->getUrl(static::API_GET_CATEGORY_LIST);

        $response = $this->sendGetRequest($bearerToken, $url, $categoryList);

        $bladeFxCategoriesListResponseTransfer = new BladeFxCategoriesListResponseTransfer();
//        $bladeFxCategoriesListResponseTransfer->setStatusCode($response->getStatusCode());
        $bladeFxCategoriesListResponseTransfer->setCategoriesList($response);

        return $bladeFxCategoriesListResponseTransfer;
//        return $this->responseManager->getCategoriesListResponseTransfer($response);
    }

    /**
     * @param ReportData $reportData
     * @param ReportParamsDefTransfer $body
     * @return string
     */
    public function getReportPreviewURL(
        ReportData $reportData,
        ReportParamsDefTransfer $body
    ): string
    {
        $bearerToken = $this->getBearerToken();
        $url = $this->getUrl(static::API_GET_REPORT_PREVIEW_URL);

        $response = $this->sendPostRequest($bearerToken, $url, $reportData, $body);

//        $bladeFxCategoriesListResponseTransfer = new BladeFxCategoriesListResponseTransfer();
//        $bladeFxCategoriesListResponseTransfer->setCategoriesList($response);

        return $response;
    }

    protected function getUrl(string $apiUrl): string
    {
        return $this->bladeFxBaseUrl . $apiUrl;
    }

    protected function sendGetRequest(string $bearerToken, string $url, object $params): array|string
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

        $contentType = $response->getHeaders(false)['content-type'][0] ?? '';

        if (str_contains($contentType, 'application/json')) {
            return $response->toArray(false);
        }

        return $response->getContent(false);
    }

    protected function sendPostRequest(string $bearerToken, string $url, ?object $params, ReportParamsDefTransfer $body): array|string
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
                'query' => $params !== null ? $this->buildQuery($params) : [],
                'json' => $body,
            ]
        );

        $contentType = $response->getHeaders(false)['content-type'][0] ?? '';

        if (str_contains($contentType, 'application/json')) {
            return $response->toArray(false);
        }

        return $response->getContent(false);
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

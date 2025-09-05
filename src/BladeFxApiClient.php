<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi;

use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use Symfony\Contracts\HttpClient\Exception\HttpExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Xiphias\BladeFxApi\DTO\BladeFxAuthenticationResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxCategoriesListRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxCategoriesListResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportDataRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportParamFormRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportParamFormResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportParamsRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportPreviewResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportsListRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportsListResponseTransfer;
use Xiphias\BladeFxApi\DTO\ReportParamsDefTransfer;
use Xiphias\BladeFxApi\Response\ResponseManager;
use Xiphias\BladeFxApi\Response\ResponseManagerInterface;

class BladeFxApiClient
{
    protected const string API_AUTH = 'api/users/authenticate';
    protected const string API_GET_REPORT_LIST = 'api/ReportData/GetReportList';
    protected const string API_GET_REPORT_DATA = 'api/ReportData/GetReportData';
    protected const string API_GET_REPORT_PARAMS = 'api/ReportData/GetReportParams';
    protected const string API_GET_REPORT_URL = 'api/ReportData/GetReportURL';
    protected const string API_GET_REPORT_PREVIEW_URL = 'api/ReportData/GetReportPreviewURL';

    protected const string API_GET_CATEGORY_LIST = 'api/ReportData/GetCategoryList';

    protected const string KEY_TOKEN = 'token';

    /**
     * @param HttpClientInterface $httpClient
     * @param string $bladeFxBaseUrl
     * @param string $bladeFxUsername
     * @param string $bladeFxPassword
     * @param LoggerInterface|null $logger
     * @param ResponseManagerInterface $responseManager
     */
    public function __construct(
        protected HttpClientInterface $httpClient,
        protected string              $bladeFxBaseUrl,
        protected string              $bladeFxUsername,
        protected string              $bladeFxPassword,
        protected ?LoggerInterface $logger = null,
        protected ResponseManagerInterface $responseManager
    )
    {
    }

    /**
     * @return BladeFxAuthenticationResponseTransfer|null
     */
    public function authenticateUser(): ?BladeFxAuthenticationResponseTransfer
    {
        $authUrl = $this->getUrl(static::API_AUTH);

        try {
            $response = $this->httpClient->request('POST', $authUrl, [
                'json' => [
                    BladeFxApiConstants::KEY_USERNAME => $this->bladeFxUsername,
                    BladeFxApiConstants::KEY_PASSWORD => $this->bladeFxPassword
                ]
            ]);

            return $this->responseManager->getAuthenticationUserResponseTransfer($response);
        } catch (\Exception|TransportExceptionInterface $e) {
            $this->logger?->error('Unexpected error when calling BladeFX API', [
                'exception' => $e,
                'url' => $authUrl,
            ]);
            return null;
        }
    }

    /**
     * @param BladeFxReportsListRequestTransfer|null $reportsListRequestTransfer
     * @return BladeFxReportsListResponseTransfer
     */
    public function getReportList(
        ?BladeFxReportsListRequestTransfer $reportsListRequestTransfer = (new BladeFxReportsListRequestTransfer())
    ): BladeFxReportsListResponseTransfer
    {
        $bearerToken = $this->authenticateUser()->getToken();
        $url = $this->getUrl(static::API_GET_REPORT_LIST);

        $response = $this->sendGetRequest($bearerToken, $url, $reportsListRequestTransfer);

        return $this->responseManager->getReportsListResponseTransfer($response);
    }

    /**
     * @param BladeFxReportParamsRequestTransfer $reportParamsRequestTransfer
     * @return string|null
     */
    public function getReportParams(
        BladeFxReportParamsRequestTransfer $reportParamsRequestTransfer
    ): ?string
    {
        $bearerToken = $this->authenticateUser()->getToken();
        $url = $this->getUrl(static::API_GET_REPORT_PARAMS);

        $response = $this->sendGetRequest($bearerToken, $url, $reportParamsRequestTransfer);

        return '';
    }

    /**
     * @param BladeFxReportDataRequestTransfer $reportDataRequestTransfer
     * @param ReportParamsDefTransfer $body
     * @return string|null
     */
    public function getReportData(
        BladeFxReportDataRequestTransfer $reportDataRequestTransfer,
        ReportParamsDefTransfer $body
    ): ?string
    {
        $bearerToken = $this->authenticateUser()->getToken();
        $url = $this->getUrl(static::API_GET_REPORT_DATA);

        $response = $this->sendPostRequest($bearerToken, $url, $reportDataRequestTransfer, $body);

        return '';
    }

    /**
     * @param BladeFxCategoriesListRequestTransfer|null $categoriesListRequestTransfer
     * @return BladeFxCategoriesListResponseTransfer
     */
    public function getCategoryList(
        ?BladeFxCategoriesListRequestTransfer $categoriesListRequestTransfer = (new BladeFxCategoriesListRequestTransfer())
    ): BladeFxCategoriesListResponseTransfer
    {
        $bearerToken = $this->authenticateUser()->getToken();
        $url = $this->getUrl(static::API_GET_CATEGORY_LIST);

        $response = $this->sendGetRequest($bearerToken, $url, $categoriesListRequestTransfer);

        return $this->responseManager->getCategoriesListResponseTransfer($response);
    }

    public function getReportUrl(
        ?BladeFxReportParamFormRequestTransfer $reportsParamFormRequestTransfer = (new BladeFxReportParamFormRequestTransfer())
    ): BladeFxReportParamFormResponseTransfer
    {
        $bearerToken = $this->authenticateUser()->getToken();
        $url = $this->getUrl(static::API_GET_REPORT_URL);

        $reportsParamFormRequestTransfer->requireRootUrl();
        $response = $this->sendGetRequest($bearerToken, $url, $reportsParamFormRequestTransfer);

        return $this->responseManager->getReportParamFormResponseTransfer($response);
    }

    /**
     * @param BladeFxReportDataRequestTransfer $reportDataRequestTransfer
     * @param ReportParamsDefTransfer $body
     * @return BladeFxReportPreviewResponseTransfer
     */
    public function getReportPreviewURL(
        BladeFxReportDataRequestTransfer $reportDataRequestTransfer,
        ReportParamsDefTransfer $body
    ): BladeFxReportPreviewResponseTransfer
    {
        $bearerToken = $this->authenticateUser()->getToken();
        $url = $this->getUrl(static::API_GET_REPORT_PREVIEW_URL);

        $response = $this->sendPostRequest($bearerToken, $url, $reportDataRequestTransfer, $body);

        return $this->responseManager->getReportPreviewResponseTransfer($response);
    }

    protected function getUrl(string $apiUrl): string
    {
        return $this->bladeFxBaseUrl . $apiUrl;
    }

    protected function sendGetRequest(string $bearerToken, string $url, object $params): \Symfony\Contracts\HttpClient\ResponseInterface
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

        return $response;
    }

    protected function sendPostRequest(string $bearerToken, string $url, ?object $params, ReportParamsDefTransfer $body): \Symfony\Contracts\HttpClient\ResponseInterface
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

        return $response;
    }

    protected function buildQuery(object $params): array
    {
        $queryArray = [];

        if (method_exists($params, 'toArray')) {
            $data = $params->toArray(true, true);
        } else {
            $data = get_object_vars($params);
        }

        foreach ($data as $key => $value) {
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

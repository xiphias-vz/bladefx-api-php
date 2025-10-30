<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Handler;

use Xiphias\BladeFxApi\BladeFxApiConfig;
use Xiphias\BladeFxApi\DTO\BladeFxAuthenticationRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxAuthenticationResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxCreateOrUpdateUserRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxCreateOrUpdateUserResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetCategoriesListRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxCategoriesListResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportByFormatRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportByFormatResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportPreviewRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportPreviewResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportsListRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportsListResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxSetFavoriteReportRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxSetFavoriteReportResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxUpdatePasswordRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxUpdatePasswordResponseTransfer;
use Xiphias\BladeFxApi\Http\Client\HttpApiClientInterface;
use Xiphias\BladeFxApi\Request\RequestFactoryInterface;
use Xiphias\BladeFxApi\Request\RequestManagerInterface;
use Xiphias\BladeFxApi\Response\ResponseManagerInterface;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportParamFormRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportParamFormResponseTransfer;

class ApiHandler implements ApiHandlerInterface
{
    /**
     * @var RequestManagerInterface
     */
    private RequestManagerInterface $requestManager;

    /**
     * @var ResponseManagerInterface
     */
    private ResponseManagerInterface $responseManager;

    /**
     * @var HttpApiClientInterface
     */
    private HttpApiClientInterface $httpClient;

    /**
     * @var BladeFxApiConfig
     */
    private BladeFxApiConfig $apiClientConfig;

    /**
     * @var RequestFactoryInterface
     */
    private RequestFactoryInterface $requestFactory;

    /**
     * @param RequestManagerInterface $requestManager
     * @param ResponseManagerInterface $responseManager
     * @param HttpApiClientInterface $httpClient
     * @param BladeFxApiConfig $apiClientConfig
     * @param RequestFactoryInterface $requestFactory
     */
    public function __construct(
        RequestManagerInterface $requestManager,
        ResponseManagerInterface $responseManager,
        HttpApiClientInterface $httpClient,
        BladeFxApiConfig $apiClientConfig,
        RequestFactoryInterface $requestFactory
    ) {
        $this->requestManager = $requestManager;
        $this->responseManager = $responseManager;
        $this->httpClient = $httpClient;
        $this->apiClientConfig = $apiClientConfig;
        $this->requestFactory = $requestFactory;
    }

    /**
     * @param BladeFxAuthenticationRequestTransfer $requestTransfer
     * @return BladeFxAuthenticationResponseTransfer
     */
    public function authenticateUser(BladeFxAuthenticationRequestTransfer $requestTransfer): BladeFxAuthenticationResponseTransfer
    {
        $this->requestManager->setRequestBuilder(
            $this->requestFactory->createAuthenticationRequestBuilder(),
        );

        $request = $this->requestManager->getAuthenticateUserRequest(
            $this->apiClientConfig->getAuthenticationUserResourceParameter(),
            $requestTransfer,
        );

        $response = $this->httpClient->sendRequest($request);

        return $this->responseManager->getAuthenticationUserResponseTransfer($response);
    }

    /**
     * @param BladeFxGetReportsListRequestTransfer $requestTransfer
     * @return BladeFxGetReportsListResponseTransfer
     */
    public function getReportsList(BladeFxGetReportsListRequestTransfer $requestTransfer): BladeFxGetReportsListResponseTransfer
    {
        $this->requestManager->setRequestBuilder(
            $this->requestFactory->createReportsListRequestBuilder(),
        );

        $request = $this->requestManager->getReportsListRequest(
            $this->apiClientConfig->getReportsListResourceParameter(),
            $requestTransfer,
        );

        $response = $this->httpClient->sendRequest($request);

        return $this->responseManager->getReportsListResponseTransfer($response);
    }

    /**
     * @param BladeFxGetCategoriesListRequestTransfer $requestTransfer
     * @return BladeFxCategoriesListResponseTransfer
     */
    public function getCategoriesList(BladeFxGetCategoriesListRequestTransfer $requestTransfer): BladeFxCategoriesListResponseTransfer
    {
        $this->requestManager->setRequestBuilder(
            $this->requestFactory->createCategoriesListRequestBuilder(),
        );

        $request = $this->requestManager->getCategoriesListRequest(
            $this->apiClientConfig->getCategoriesListResourceParameter(),
            $requestTransfer,
        );

        $response = $this->httpClient->sendRequest($request);

        return $this->responseManager->getCategoriesListResponseTransfer($response);
    }

    /**
     * @param BladeFxGetReportParamFormRequestTransfer $requestTransfer
     * @return BladeFxGetReportParamFormResponseTransfer
     */
    public function getReportParamForm(BladeFxGetReportParamFormRequestTransfer $requestTransfer): BladeFxGetReportParamFormResponseTransfer
    {
        $this->requestManager->setRequestBuilder(
            $this->requestFactory->createReportParamFormRequestBuilder(),
        );

        $request = $this->requestManager->getReportParamFormRequest(
            $this->apiClientConfig->getReportParamFormResourceParameter(),
            $requestTransfer,
        );

        $response = $this->httpClient->sendRequest($request);

        return $this->responseManager->getReportParamFormResponseTransfer($response);
    }

    /**
     * @param BladeFxGetReportPreviewRequestTransfer $requestTransfer
     * @return BladeFxGetReportPreviewResponseTransfer
     */
    public function getReportPreview(BladeFxGetReportPreviewRequestTransfer $requestTransfer): BladeFxGetReportPreviewResponseTransfer
    {
        $this->requestManager->setRequestBuilder(
            $this->requestFactory->createReportPreviewRequestBuilder(),
        );

        $request = $this->requestManager->getReportPreview(
            $this->apiClientConfig->getReportPreviewResourceParameter(),
            $requestTransfer,
        );

        $response = $this->httpClient->sendRequest($request);

        return $this->responseManager->getReportPreviewResponseTransfer($response);
    }

    /**
     * @param BladeFxSetFavoriteReportRequestTransfer $requestTransfer
     * @return BladeFxSetFavoriteReportResponseTransfer
     */
    public function setFavoriteReport(BladeFxSetFavoriteReportRequestTransfer $requestTransfer): BladeFxSetFavoriteReportResponseTransfer
    {
        $this->requestManager->setRequestBuilder(
            $this->requestFactory->createSetFavoriteReportRequestBuilder(),
        );

        $request = $this->requestManager->getSetFavoriteReportRequest(
            $this->apiClientConfig->getSetFavoriteReportResourceParameter(),
            $requestTransfer,
        );

        $response = $this->httpClient->sendRequest($request);

        return $this->responseManager->getSetFavoriteReportResponseTransfer($response);
    }

    /**
     * @param BladeFxCreateOrUpdateUserRequestTransfer $requestTransfer
     * @return BladeFxCreateOrUpdateUserResponseTransfer
     */
    public function createOrUpdateUserOnBladeFx(BladeFxCreateOrUpdateUserRequestTransfer $requestTransfer): BladeFxCreateOrUpdateUserResponseTransfer
    {
        $this->requestManager->setRequestBuilder(
            $this->requestFactory->createCreateOrUpdateUserOnBladeFxRequestBuilder(),
        );

        $request = $this->requestManager->getCreateOrUpdateUserOnBladeFxRequest(
            $this->apiClientConfig->getCreateOrUpdateUserOnBfxResourceParameter(),
            $requestTransfer,
        );

        $response = $this->httpClient->sendRequest($request);

        return $this->responseManager->getCreateOrUpdateUserOnBladeFxResponseTransfer($response);
    }

    /**
     * @param BladeFxUpdatePasswordRequestTransfer $requestTransfer
     * @return BladeFxUpdatePasswordResponseTransfer
     */
    public function sendUpdatePasswordOnBladeFx(BladeFxUpdatePasswordRequestTransfer $requestTransfer): BladeFxUpdatePasswordResponseTransfer
    {
        $this->requestManager->setRequestBuilder(
            $this->requestFactory->createUpdatePasswordOnBladeFxRequestBuilder(),
        );

        $request = $this->requestManager->getUpdatePasswordOnBladeFxRequest(
            $this->apiClientConfig->getUpdatePasswordOnBladeFxResourceParameter(),
            $requestTransfer,
        );

        $response = $this->httpClient->sendRequest($request);

        return $this->responseManager->getUpdatePasswordOnBladeFxRequest($response);
    }

    /**
     * @param BladeFxGetReportByFormatRequestTransfer $requestTransfer
     * @return BladeFxGetReportByFormatResponseTransfer
     */
    public function getReportByFormat(
        BladeFxGetReportByFormatRequestTransfer $requestTransfer
    ): BladeFxGetReportByFormatResponseTransfer {
        $this->requestManager->setRequestBuilder(
            $this->requestFactory->createReportByFormatRequestBuilder(),
        );

        $fileFormat = $requestTransfer->getFileFormat();
        $resource = $this->getResourceParameterByFileFormat($fileFormat);

        $request = $this->requestManager->getReportByFormatRequest(
            $resource,
            $requestTransfer,
        );

        $response = $this->httpClient->sendRequest($request);

        return $this->responseManager->getReportByFormatResponseTransfer($response, $fileFormat);
    }

    /**
     * @param string $format
     *
     * @return string
     */
    protected function getResourceParameterByFileFormat(string $format): string
    {
        return match ($format) {
            'html' => $this->apiClientConfig->getReportHTMLResourceParameter(),
            'pdf' => $this->apiClientConfig->getReportPDFResourceParameter(),
            'csv' => $this->apiClientConfig->getReportCSVResourceParameter(),
            'pptx' => $this->apiClientConfig->getReportPPTXResourceParameter(),
            'docx' => $this->apiClientConfig->getReportDOCXResourceParameter(),
            'xlsx' => $this->apiClientConfig->getReportXLSXResourceParameter(),
            'mht' => $this->apiClientConfig->getReportMHTResourceParameter(),
            'rtf' => $this->apiClientConfig->getReportRTFResourceParameter(),
            'jpg' => $this->apiClientConfig->getReportIMGResourceParameter(),
            default => 'error',
        };
    }
}

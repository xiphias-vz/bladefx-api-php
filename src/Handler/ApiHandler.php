<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Handler;

use Xiphias\BladeFxApi\BladeFxApiConfig;
use Xiphias\BladeFxApi\DTO\BladeFxAuthenticationRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxAuthenticationResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxCategoriesListRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxCategoriesListResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportPreviewRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportPreviewResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportsListRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportsListResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxSetFavoriteReportRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxSetFavoriteReportResponseTransfer;
use Xiphias\BladeFxApi\Http\Client\HttpApiClientInterface;
use Xiphias\BladeFxApi\Request\RequestFactoryInterface;
use Xiphias\BladeFxApi\Request\RequestManagerInterface;
use Xiphias\BladeFxApi\Response\ResponseManagerInterface;
use Xiphias\BladeFxApi\DTO\BladeFxReportParamFormRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportParamFormResponseTransfer;

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
     * @param BladeFxReportsListRequestTransfer $requestTransfer
     * @return BladeFxReportsListResponseTransfer
     */
    public function getReportsList(BladeFxReportsListRequestTransfer $requestTransfer): BladeFxReportsListResponseTransfer
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
     * @param BladeFxCategoriesListRequestTransfer $requestTransfer
     * @return BladeFxCategoriesListResponseTransfer
     */
    public function getCategoriesList(BladeFxCategoriesListRequestTransfer $requestTransfer): BladeFxCategoriesListResponseTransfer
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
     * @param BladeFxReportParamFormRequestTransfer $requestTransfer
     * @return BladeFxReportParamFormResponseTransfer
     */
    public function getReportParamForm(BladeFxReportParamFormRequestTransfer $requestTransfer): BladeFxReportParamFormResponseTransfer
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
     * @param BladeFxReportPreviewRequestTransfer $requestTransfer
     * @return BladeFxReportPreviewResponseTransfer
     */
    public function getReportPreview(BladeFxReportPreviewRequestTransfer $requestTransfer): BladeFxReportPreviewResponseTransfer
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
}

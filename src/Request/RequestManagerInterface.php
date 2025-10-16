<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Request;

use Psr\Http\Message\RequestInterface;
use Xiphias\BladeFxApi\DTO\BladeFxAuthenticationRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetCategoriesListRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportParamFormRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportPreviewRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportsListRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxSetFavoriteReportRequestTransfer;
use Xiphias\BladeFxApi\Request\Builder\RequestBuilderInterface;

interface RequestManagerInterface
{
    /**
     * @param RequestBuilderInterface $requestBuilder
     * @return void
     */
    public function setRequestBuilder(RequestBuilderInterface $requestBuilder): void;

    /**
     * @param string $resource
     * @param BladeFxAuthenticationRequestTransfer $requestTransfer
     * @return RequestInterface
     */
    public function getAuthenticateUserRequest(
        string $resource,
        BladeFxAuthenticationRequestTransfer $requestTransfer
    ): RequestInterface;

    /**
     * @param string $resource
     * @param BladeFxGetCategoriesListRequestTransfer $requestTransfer
     * @return RequestInterface
     */
    public function getCategoriesListRequest(
        string $resource,
        BladeFxGetCategoriesListRequestTransfer $requestTransfer
    ): RequestInterface;

    /**
     * @param string $resource
     * @param BladeFxGetReportsListRequestTransfer $requestTransfer
     * @return RequestInterface
     */
    public function getReportsListRequest(
        string $resource,
        BladeFxGetReportsListRequestTransfer $requestTransfer
    ): RequestInterface;

    /**
     * @param string $resource
     * @param BladeFxGetReportParamFormRequestTransfer $requestTransfer
     * @return RequestInterface
     */
    public function getReportParamFormRequest(
        string $resource,
        BladeFxGetReportParamFormRequestTransfer $requestTransfer
    ): RequestInterface;

    /**
     * @param string $resource
     * @param BladeFxGetReportPreviewRequestTransfer $requestTransfer
     * @return RequestInterface
     */
    public function getReportPreview(
        string $resource,
        BladeFxGetReportPreviewRequestTransfer $requestTransfer
    ): RequestInterface;

    /**
     * @param string $resource
     * @param BladeFxSetFavoriteReportRequestTransfer $requestTransfer
     * @return RequestInterface
     */
    public function getSetFavoriteReportRequest(
        string $resource,
        BladeFxSetFavoriteReportRequestTransfer $requestTransfer
    ): RequestInterface;
}

<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Request;

use Psr\Http\Message\RequestInterface;
use Xiphias\BladeFxApi\DTO\BladeFxAuthenticationRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxCategoriesListRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportParamFormRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportPreviewRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportsListRequestTransfer;
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
     * @param BladeFxCategoriesListRequestTransfer $requestTransfer
     * @return RequestInterface
     */
    public function getCategoriesListRequest(
        string $resource,
        BladeFxCategoriesListRequestTransfer $requestTransfer
    ): RequestInterface;

    /**
     * @param string $resource
     * @param BladeFxReportsListRequestTransfer $requestTransfer
     * @return RequestInterface
     */
    public function getReportsListRequest(
        string $resource,
        BladeFxReportsListRequestTransfer $requestTransfer
    ): RequestInterface;

    /**
     * @param string $resource
     * @param BladeFxReportParamFormRequestTransfer $requestTransfer
     * @return RequestInterface
     */
    public function getReportParamFormRequest(
        string $resource,
        BladeFxReportParamFormRequestTransfer $requestTransfer
    ): RequestInterface;

    /**
     * @param string $resource
     * @param BladeFxReportPreviewRequestTransfer $requestTransfer
     * @return RequestInterface
     */
    public function getReportPreview(
        string $resource,
        BladeFxReportPreviewRequestTransfer $requestTransfer
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

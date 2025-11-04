<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Response;

use Psr\Http\Message\ResponseInterface;
use Xiphias\BladeFxApi\DTO\BladeFxAuthenticationResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxCategoriesListResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxCreateOrUpdateUserResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportByFormatResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportParamFormResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportPreviewResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportsListResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxSetFavoriteReportResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxUpdatePasswordResponseTransfer;

interface ResponseManagerInterface
{
    /**
     * @param \Psr\Http\Message\ResponseInterface|null $response
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxAuthenticationResponseTransfer
     */
    public function getAuthenticationUserResponseTransfer(?ResponseInterface $response): BladeFxAuthenticationResponseTransfer;

    /**
     * @param \Psr\Http\Message\ResponseInterface|null $response
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxCategoriesListResponseTransfer
     */
    public function getCategoriesListResponseTransfer(?ResponseInterface $response): BladeFxCategoriesListResponseTransfer;

    /**
     * @param \Psr\Http\Message\ResponseInterface|null $response
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxGetReportsListResponseTransfer
     */
    public function getReportsListResponseTransfer(?ResponseInterface $response): BladeFxGetReportsListResponseTransfer;

    /**
     * @param \Psr\Http\Message\ResponseInterface|null $response
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxGetReportParamFormResponseTransfer
     */
    public function getReportParamFormResponseTransfer(?ResponseInterface $response): BladeFxGetReportParamFormResponseTransfer;

    /**
     * @param \Psr\Http\Message\ResponseInterface|null $response
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxGetReportPreviewResponseTransfer
     */
    public function getReportPreviewResponseTransfer(?ResponseInterface $response): BladeFxGetReportPreviewResponseTransfer;

    /**
     * @param \Psr\Http\Message\ResponseInterface|null $response
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxSetFavoriteReportResponseTransfer
     */
    public function getSetFavoriteReportResponseTransfer(?ResponseInterface $response): BladeFxSetFavoriteReportResponseTransfer;

    /**
     * @param \Psr\Http\Message\ResponseInterface|null $response
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxCreateOrUpdateUserResponseTransfer
     */
    public function getCreateOrUpdateUserOnBladeFxResponseTransfer(?ResponseInterface $response): BladeFxCreateOrUpdateUserResponseTransfer;

    /**
     * @param \Psr\Http\Message\ResponseInterface|null $response
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxUpdatePasswordResponseTransfer
     */
    public function getUpdatePasswordOnBladeFxRequest(?ResponseInterface $response): BladeFxUpdatePasswordResponseTransfer;

    /**
     * @param \Psr\Http\Message\ResponseInterface|null $response
     * @param string $format
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxGetReportByFormatResponseTransfer
     */
    public function getReportByFormatResponseTransfer(?ResponseInterface $response, string $format): BladeFxGetReportByFormatResponseTransfer;
}

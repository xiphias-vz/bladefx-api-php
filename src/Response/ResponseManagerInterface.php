<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Response;

use Psr\Http\Message\ResponseInterface;
use Xiphias\BladeFxApi\DTO\BladeFxAuthenticationResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxCategoriesListResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxCreateOrUpdateUserResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportParamFormResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportPreviewResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportsListResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxSetFavoriteReportResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxUpdatePasswordResponseTransfer;

interface ResponseManagerInterface
{
    /**
     * @param ResponseInterface|null $response
     * @return BladeFxAuthenticationResponseTransfer
     */
    public function getAuthenticationUserResponseTransfer(?ResponseInterface $response): BladeFxAuthenticationResponseTransfer;

    /**
     * @param ResponseInterface|null $response
     * @return BladeFxCategoriesListResponseTransfer
     */
    public function getCategoriesListResponseTransfer(?ResponseInterface $response): BladeFxCategoriesListResponseTransfer;

    /**
     * @param ResponseInterface|null $response
     * @return BladeFxGetReportsListResponseTransfer
     */
    public function getReportsListResponseTransfer(?ResponseInterface $response): BladeFxGetReportsListResponseTransfer;

    /**
     * @param ResponseInterface|null $response
     * @return BladeFxGetReportParamFormResponseTransfer
     */
    public function getReportParamFormResponseTransfer(?ResponseInterface $response): BladeFxGetReportParamFormResponseTransfer;

    /**
     * @param ResponseInterface|null $response
     * @return BladeFxGetReportPreviewResponseTransfer
     */
    public function getReportPreviewResponseTransfer(?ResponseInterface $response): BladeFxGetReportPreviewResponseTransfer;

    /**
     * @param ResponseInterface|null $response
     * @return BladeFxSetFavoriteReportResponseTransfer
     */
    public function getSetFavoriteReportResponseTransfer(?ResponseInterface $response): BladeFxSetFavoriteReportResponseTransfer;

    /**
     * @param ResponseInterface|null $response
     * @return BladeFxCreateOrUpdateUserResponseTransfer
     */
    public function getCreateOrUpdateUserOnBladeFxResponseTransfer(?ResponseInterface $response): BladeFxCreateOrUpdateUserResponseTransfer;

    /**
     * @param ResponseInterface|null $response
     * @return BladeFxUpdatePasswordResponseTransfer
     */
    public function getUpdatePasswordOnBladeFxRequest(?ResponseInterface $response): BladeFxUpdatePasswordResponseTransfer;
}

<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi;

use Xiphias\BladeFxApi\DTO\BladeFxAuthenticationRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxAuthenticationResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxCategoriesListResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxCreateOrUpdateUserRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxCreateOrUpdateUserResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetCategoriesListRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportByFormatRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportByFormatResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportParamFormRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportParamFormResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportPreviewRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportPreviewResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportsListRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportsListResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxSetFavoriteReportRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxSetFavoriteReportResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxUpdatePasswordRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxUpdatePasswordResponseTransfer;

interface BladeFxApiClientInterface
{
    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxAuthenticationRequestTransfer $bladeFxAuthenticationRequestTransfer
     * @param bool $fromSpryker
     *
     * @throws \DateMalformedStringException
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxAuthenticationResponseTransfer|null
     */
    public function sendAuthenticateUserRequest(
        BladeFxAuthenticationRequestTransfer $bladeFxAuthenticationRequestTransfer,
        bool $fromSpryker
    ): ?BladeFxAuthenticationResponseTransfer;

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxGetCategoriesListRequestTransfer|null $categoriesListRequestTransfer
     * @param bool $fromSpryker
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxCategoriesListResponseTransfer
     */
    public function sendGetCategoriesListRequest(
        ?BladeFxGetCategoriesListRequestTransfer $categoriesListRequestTransfer,
        bool $fromSpryker = false
    ): BladeFxCategoriesListResponseTransfer;

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxGetReportsListRequestTransfer|null $reportsListRequestTransfer
     * @param bool $fromSpryker
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxGetReportsListResponseTransfer
     */
    public function sendGetReportsListRequest(
        ?BladeFxGetReportsListRequestTransfer $reportsListRequestTransfer,
        bool $fromSpryker = false
    ): BladeFxGetReportsListResponseTransfer;

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxSetFavoriteReportRequestTransfer|null $bladeFxSetFavoriteReportRequestTransfer
     * @param bool $fromSpryker
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxSetFavoriteReportResponseTransfer
     */
    public function sendSetFavoriteReportRequest(
        ?BladeFxSetFavoriteReportRequestTransfer $bladeFxSetFavoriteReportRequestTransfer,
        bool $fromSpryker = false
    ): BladeFxSetFavoriteReportResponseTransfer;

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxGetReportParamFormRequestTransfer|null $reportsParamFormRequestTransfer
     * @param bool $fromSpryker
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxGetReportParamFormResponseTransfer
     */
    public function sendGetReportParamFormRequest(
        ?BladeFxGetReportParamFormRequestTransfer $reportsParamFormRequestTransfer,
        bool $fromSpryker = false
    ): BladeFxGetReportParamFormResponseTransfer;

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxGetReportPreviewRequestTransfer $bladeFxReportPreviewRequestTransfer
     * @param bool $fromSpryker
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxGetReportPreviewResponseTransfer
     */
    public function sendGetReportPreviewRequest(
        BladeFxGetReportPreviewRequestTransfer $bladeFxReportPreviewRequestTransfer,
        bool $fromSpryker = false
    ): BladeFxGetReportPreviewResponseTransfer;

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxCreateOrUpdateUserRequestTransfer $bladeFxCreateOrUpdateUserRequestTransfer
     * @param bool $fromSpryker
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxCreateOrUpdateUserResponseTransfer
     */
    public function sendCreateOrUpdateUserOnBfxRequest(
        BladeFxCreateOrUpdateUserRequestTransfer $bladeFxCreateOrUpdateUserRequestTransfer,
        bool $fromSpryker = false
    ): BladeFxCreateOrUpdateUserResponseTransfer;

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxUpdatePasswordRequestTransfer $bladeFxUpdatePasswordRequestTransfer
     * @param bool $fromSpryker
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxUpdatePasswordResponseTransfer
     */
    public function sendUpdatePasswordOnBladeFxRequest(
        BladeFxUpdatePasswordRequestTransfer $bladeFxUpdatePasswordRequestTransfer,
        bool $fromSpryker = false
    ): BladeFxUpdatePasswordResponseTransfer;

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxGetReportByFormatRequestTransfer $bladeFxGetReportByFormatRequestTransfer
     * @param bool $fromSpryker
     *
     * @throws \DateMalformedStringException
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxGetReportByFormatResponseTransfer
     */
    public function sendGetReportByFormatRequest(
        BladeFxGetReportByFormatRequestTransfer $bladeFxGetReportByFormatRequestTransfer,
        bool $fromSpryker = false
    ): BladeFxGetReportByFormatResponseTransfer;
}

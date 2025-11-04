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
     *
     * @throws \DateMalformedStringException
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxAuthenticationResponseTransfer|null
     */
    public function sendAuthenticateUserRequest(
        BladeFxAuthenticationRequestTransfer $bladeFxAuthenticationRequestTransfer
    ): ?BladeFxAuthenticationResponseTransfer;

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxGetCategoriesListRequestTransfer|null $categoriesListRequestTransfer
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxCategoriesListResponseTransfer
     */
    public function sendGetCategoriesListRequest(
        ?BladeFxGetCategoriesListRequestTransfer $categoriesListRequestTransfer
    ): BladeFxCategoriesListResponseTransfer;

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxGetReportsListRequestTransfer|null $reportsListRequestTransfer
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxGetReportsListResponseTransfer
     */
    public function sendGetReportsListRequest(?BladeFxGetReportsListRequestTransfer $reportsListRequestTransfer): BladeFxGetReportsListResponseTransfer;

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxSetFavoriteReportRequestTransfer|null $bladeFxSetFavoriteReportRequestTransfer
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxSetFavoriteReportResponseTransfer
     */
    public function sendSetFavoriteReportRequest(
        ?BladeFxSetFavoriteReportRequestTransfer $bladeFxSetFavoriteReportRequestTransfer
    ): BladeFxSetFavoriteReportResponseTransfer;

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxGetReportParamFormRequestTransfer|null $reportsParamFormRequestTransfer
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxGetReportParamFormResponseTransfer
     */
    public function sendGetReportParamFormRequest(
        ?BladeFxGetReportParamFormRequestTransfer $reportsParamFormRequestTransfer
    ): BladeFxGetReportParamFormResponseTransfer;

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxGetReportPreviewRequestTransfer $bladeFxReportPreviewRequestTransfer
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxGetReportPreviewResponseTransfer
     */
    public function sendGetReportPreviewRequest(
        BladeFxGetReportPreviewRequestTransfer $bladeFxReportPreviewRequestTransfer
    ): BladeFxGetReportPreviewResponseTransfer;

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxCreateOrUpdateUserRequestTransfer $bladeFxCreateOrUpdateUserRequestTransfer
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxCreateOrUpdateUserResponseTransfer
     */
    public function sendCreateOrUpdateUserOnBfxRequest(
        BladeFxCreateOrUpdateUserRequestTransfer $bladeFxCreateOrUpdateUserRequestTransfer
    ): BladeFxCreateOrUpdateUserResponseTransfer;

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxUpdatePasswordRequestTransfer $bladeFxUpdatePasswordRequestTransfer
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxUpdatePasswordResponseTransfer
     */
    public function sendUpdatePasswordOnBladeFxRequest(
        BladeFxUpdatePasswordRequestTransfer $bladeFxUpdatePasswordRequestTransfer
    ): BladeFxUpdatePasswordResponseTransfer;

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxGetReportByFormatRequestTransfer $bladeFxGetReportByFormatRequestTransfer
     *
     * @throws \DateMalformedStringException
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxGetReportByFormatResponseTransfer
     */
    public function sendGetReportByFormatRequest(
        BladeFxGetReportByFormatRequestTransfer $bladeFxGetReportByFormatRequestTransfer
    ): BladeFxGetReportByFormatResponseTransfer;
}

<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi;

use Xiphias\BladeFxApi\DTO\AbstractTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxAuthenticationRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxAuthenticationResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetCategoriesListRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxCategoriesListResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportParamFormRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportParamFormResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportPreviewRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportPreviewResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportsListRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportsListResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxSetFavoriteReportRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxSetFavoriteReportResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxTokenTransfer;

interface ReportsApiClientInterface
{
    /**
     * @return BladeFxAuthenticationResponseTransfer|null
     * @throws \DateMalformedStringException
     */
    public function sendAuthenticateUserRequest(): ?BladeFxAuthenticationResponseTransfer;

    /**
     * @param BladeFxGetCategoriesListRequestTransfer|null $categoriesListRequestTransfer
     * @return BladeFxCategoriesListResponseTransfer
     */
    public function sendGetCategoriesListRequest(?BladeFxGetCategoriesListRequestTransfer $categoriesListRequestTransfer): BladeFxCategoriesListResponseTransfer;

    /**
     * @param BladeFxGetReportsListRequestTransfer|null $reportsListRequestTransfer
     * @return BladeFxGetReportsListResponseTransfer
     */
    public function sendGetReportsListRequest(?BladeFxGetReportsListRequestTransfer $reportsListRequestTransfer): BladeFxGetReportsListResponseTransfer;

    /**
     * @param BladeFxSetFavoriteReportRequestTransfer|null $bladeFxSetFavoriteReportRequestTransfer
     * @return BladeFxSetFavoriteReportResponseTransfer
     */
    public function sendSetFavoriteReportRequest(?BladeFxSetFavoriteReportRequestTransfer $bladeFxSetFavoriteReportRequestTransfer): BladeFxSetFavoriteReportResponseTransfer;

//
//    public function sendGetReportByFormatRequest(
//        BladeFxGetReportByFormatRequestTransfer $requestTransfer
//    ): BladeFxGetReportByFormatResponseTransfer;

    /**
     * @param BladeFxGetReportParamFormRequestTransfer|null $reportsParamFormRequestTransfer
     * @return BladeFxReportParamFormResponseTransfer
     */
    public function sendGetReportParamFormRequest(?BladeFxGetReportParamFormRequestTransfer $reportsParamFormRequestTransfer): BladeFxReportParamFormResponseTransfer;

    /**
     * @param BladeFxGetReportPreviewRequestTransfer $bladeFxReportPreviewRequestTransfer
     * @return BladeFxReportPreviewResponseTransfer
     */
    public function sendGetReportPreviewRequest(BladeFxGetReportPreviewRequestTransfer $bladeFxReportPreviewRequestTransfer): BladeFxReportPreviewResponseTransfer;

//
//    public function sendGetReportParameterListRequest(
//        BladeFxGetReportParameterListRequestTransfer $requestTransfer
//    ): BladeFxGetReportParameterListResponseTransfer;
//
//
//    public function sendCreateOrUpdateUserOnBfxRequest(
//        BladeFxCreateOrUpdateUserRequestTransfer $requestTransfer
//    ): BladeFxCreateOrUpdateUserResponseTransfer;
//
//
//    public function sendUpdatePasswordOnBladeFxRequest(
//        BladeFxUpdatePasswordRequestTransfer $requestTransfer
//    ): BladeFxUpdatePasswordResponseTransfer;
}

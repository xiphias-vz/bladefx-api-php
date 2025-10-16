<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi;

use Xiphias\BladeFxApi\DTO\AbstractTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxAuthenticationRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxAuthenticationResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxCategoriesListRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxCategoriesListResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportParamFormRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportParamFormResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportPreviewRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportPreviewResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportsListRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportsListResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxSetFavoriteReportRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxSetFavoriteReportResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxTokenTransfer;

interface ReportsApiClientInterface
{
    public function sendAuthenticateUserRequest(): BladeFxTokenTransfer;


    public function sendGetCategoriesListRequest(?BladeFxCategoriesListRequestTransfer $categoriesListRequestTransfer): BladeFxCategoriesListResponseTransfer;


    public function sendGetReportsListRequest(?BladeFxReportsListRequestTransfer $reportsListRequestTransfer): BladeFxReportsListResponseTransfer;


    public function sendSetFavoriteReportRequest(?BladeFxSetFavoriteReportRequestTransfer $bladeFxSetFavoriteReportRequestTransfer): BladeFxSetFavoriteReportResponseTransfer;

//
//    public function sendGetReportByFormatRequest(
//        BladeFxGetReportByFormatRequestTransfer $requestTransfer
//    ): BladeFxGetReportByFormatResponseTransfer;


    public function sendGetReportParamFormRequest(?BladeFxReportParamFormRequestTransfer $reportsParamFormRequestTransfer): BladeFxReportParamFormResponseTransfer;


    public function sendGetReportPreviewRequest(BladeFxReportPreviewRequestTransfer $bladeFxReportPreviewRequestTransfer): BladeFxReportPreviewResponseTransfer;

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

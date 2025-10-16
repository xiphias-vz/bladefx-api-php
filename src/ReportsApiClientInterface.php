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
use Xiphias\BladeFxApi\DTO\BladeFxReportsListResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxSetFavoriteReportRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxSetFavoriteReportResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxTokenTransfer;

interface ReportsApiClientInterface
{
    public function sendAuthenticateUserRequest(): BladeFxTokenTransfer;


    public function sendGetCategoriesListRequest(?BladeFxGetCategoriesListRequestTransfer $categoriesListRequestTransfer): BladeFxCategoriesListResponseTransfer;


    public function sendGetReportsListRequest(?BladeFxGetReportsListRequestTransfer $reportsListRequestTransfer): BladeFxReportsListResponseTransfer;


    public function sendSetFavoriteReportRequest(?BladeFxSetFavoriteReportRequestTransfer $bladeFxSetFavoriteReportRequestTransfer): BladeFxSetFavoriteReportResponseTransfer;

//
//    public function sendGetReportByFormatRequest(
//        BladeFxGetReportByFormatRequestTransfer $requestTransfer
//    ): BladeFxGetReportByFormatResponseTransfer;


    public function sendGetReportParamFormRequest(?BladeFxGetReportParamFormRequestTransfer $reportsParamFormRequestTransfer): BladeFxReportParamFormResponseTransfer;


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

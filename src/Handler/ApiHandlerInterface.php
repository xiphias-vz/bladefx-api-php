<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Handler;

use Xiphias\BladeFxApi\DTO\BladeFxAuthenticationRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxAuthenticationResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxCreateOrUpdateUserRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxCreateOrUpdateUserResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetCategoriesListRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxCategoriesListResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportParamFormRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportParamFormResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportPreviewRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportPreviewResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportsListRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportsListResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxSetFavoriteReportRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxSetFavoriteReportResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxUpdatePasswordRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxUpdatePasswordResponseTransfer;

interface ApiHandlerInterface
{
    /**
     * @param BladeFxAuthenticationRequestTransfer $requestTransfer
     * @return BladeFxAuthenticationResponseTransfer
     */
    public function authenticateUser(BladeFxAuthenticationRequestTransfer $requestTransfer): BladeFxAuthenticationResponseTransfer;

    /**
     * @param BladeFxGetReportsListRequestTransfer $requestTransfer
     * @return BladeFxGetReportsListResponseTransfer
     */
    public function getReportsList(BladeFxGetReportsListRequestTransfer $requestTransfer): BladeFxGetReportsListResponseTransfer;

    /**
     * @param BladeFxGetCategoriesListRequestTransfer $requestTransfer
     * @return BladeFxCategoriesListResponseTransfer
     */
    public function getCategoriesList(BladeFxGetCategoriesListRequestTransfer $requestTransfer): BladeFxCategoriesListResponseTransfer;

    /**
     * @param BladeFxGetReportParamFormRequestTransfer $requestTransfer
     * @return BladeFxGetReportParamFormResponseTransfer
     */
    public function getReportParamForm(BladeFxGetReportParamFormRequestTransfer $requestTransfer): BladeFxGetReportParamFormResponseTransfer;

    /**
     * @param BladeFxGetReportPreviewRequestTransfer $requestTransfer
     * @return BladeFxReportPreviewResponseTransfer
     */
    public function getReportPreview(BladeFxGetReportPreviewRequestTransfer $requestTransfer): BladeFxReportPreviewResponseTransfer;

    /**
     * @param BladeFxSetFavoriteReportRequestTransfer $requestTransfer
     * @return BladeFxSetFavoriteReportResponseTransfer
     */
    public function setFavoriteReport(BladeFxSetFavoriteReportRequestTransfer $requestTransfer): BladeFxSetFavoriteReportResponseTransfer;

    /**
     * @param BladeFxCreateOrUpdateUserRequestTransfer $requestTransfer
     * @return BladeFxCreateOrUpdateUserResponseTransfer
     */
    public function createOrUpdateUserOnBladeFx(BladeFxCreateOrUpdateUserRequestTransfer $requestTransfer): BladeFxCreateOrUpdateUserResponseTransfer;

    /**
     * @param BladeFxUpdatePasswordRequestTransfer $requestTransfer
     * @return BladeFxUpdatePasswordResponseTransfer
     */
    public function sendUpdatePasswordOnBladeFx(BladeFxUpdatePasswordRequestTransfer $requestTransfer): BladeFxUpdatePasswordResponseTransfer;
}

<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Handler;

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

interface ApiHandlerInterface
{
    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxAuthenticationRequestTransfer $requestTransfer
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxAuthenticationResponseTransfer
     */
    public function authenticateUser(BladeFxAuthenticationRequestTransfer $requestTransfer): BladeFxAuthenticationResponseTransfer;

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxGetReportsListRequestTransfer $requestTransfer
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxGetReportsListResponseTransfer
     */
    public function getReportsList(BladeFxGetReportsListRequestTransfer $requestTransfer): BladeFxGetReportsListResponseTransfer;

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxGetCategoriesListRequestTransfer $requestTransfer
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxCategoriesListResponseTransfer
     */
    public function getCategoriesList(BladeFxGetCategoriesListRequestTransfer $requestTransfer): BladeFxCategoriesListResponseTransfer;

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxGetReportParamFormRequestTransfer $requestTransfer
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxGetReportParamFormResponseTransfer
     */
    public function getReportParamForm(BladeFxGetReportParamFormRequestTransfer $requestTransfer): BladeFxGetReportParamFormResponseTransfer;

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxGetReportPreviewRequestTransfer $requestTransfer
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxGetReportPreviewResponseTransfer
     */
    public function getReportPreview(BladeFxGetReportPreviewRequestTransfer $requestTransfer): BladeFxGetReportPreviewResponseTransfer;

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxSetFavoriteReportRequestTransfer $requestTransfer
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxSetFavoriteReportResponseTransfer
     */
    public function setFavoriteReport(BladeFxSetFavoriteReportRequestTransfer $requestTransfer): BladeFxSetFavoriteReportResponseTransfer;

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxCreateOrUpdateUserRequestTransfer $requestTransfer
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxCreateOrUpdateUserResponseTransfer
     */
    public function createOrUpdateUserOnBladeFx(BladeFxCreateOrUpdateUserRequestTransfer $requestTransfer): BladeFxCreateOrUpdateUserResponseTransfer;

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxUpdatePasswordRequestTransfer $requestTransfer
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxUpdatePasswordResponseTransfer
     */
    public function sendUpdatePasswordOnBladeFx(BladeFxUpdatePasswordRequestTransfer $requestTransfer): BladeFxUpdatePasswordResponseTransfer;

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxGetReportByFormatRequestTransfer $requestTransfer
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxGetReportByFormatResponseTransfer
     */
    public function getReportByFormat(BladeFxGetReportByFormatRequestTransfer $requestTransfer): BladeFxGetReportByFormatResponseTransfer;
}

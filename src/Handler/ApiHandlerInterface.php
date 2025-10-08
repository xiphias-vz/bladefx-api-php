<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Handler;

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

interface ApiHandlerInterface
{
    /**
     * @param BladeFxAuthenticationRequestTransfer $requestTransfer
     * @return BladeFxAuthenticationResponseTransfer
     */
    public function authenticateUser(BladeFxAuthenticationRequestTransfer $requestTransfer): BladeFxAuthenticationResponseTransfer;

    /**
     * @param BladeFxReportsListRequestTransfer $requestTransfer
     * @return BladeFxReportsListResponseTransfer
     */
    public function getReportsList(BladeFxReportsListRequestTransfer $requestTransfer): BladeFxReportsListResponseTransfer;

    /**
     * @param BladeFxCategoriesListRequestTransfer $requestTransfer
     * @return BladeFxCategoriesListResponseTransfer
     */
    public function getCategoriesList(BladeFxCategoriesListRequestTransfer $requestTransfer): BladeFxCategoriesListResponseTransfer;

    /**
     * @param BladeFxReportParamFormRequestTransfer $requestTransfer
     * @return BladeFxReportParamFormResponseTransfer
     */
    public function getReportParamForm(BladeFxReportParamFormRequestTransfer $requestTransfer): BladeFxReportParamFormResponseTransfer;

    /**
     * @param BladeFxReportPreviewRequestTransfer $requestTransfer
     * @return BladeFxReportPreviewResponseTransfer
     */
    public function getReportPreview(BladeFxReportPreviewRequestTransfer $requestTransfer): BladeFxReportPreviewResponseTransfer;

    /**
     * @param BladeFxSetFavoriteReportRequestTransfer $requestTransfer
     * @return BladeFxSetFavoriteReportResponseTransfer
     */
    public function setFavoriteReport(BladeFxSetFavoriteReportRequestTransfer $requestTransfer): BladeFxSetFavoriteReportResponseTransfer;
}

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
use Xiphias\BladeFxApi\Handler\ApiHandlerInterface;

class BladeFxApiClient
{
    /**
     * @param string $bladeFxBaseUrl
     * @param string $bladeFxUsername
     * @param string $bladeFxPassword
     * @param ApiHandlerInterface $apiHandler
     */
    public function __construct(
        protected string                    $bladeFxBaseUrl,
        protected string                    $bladeFxUsername,
        protected string                    $bladeFxPassword,
        protected ApiHandlerInterface       $apiHandler
    )
    {
    }

    /**
     * @return BladeFxAuthenticationResponseTransfer|null
     */
    public function authenticateUser(): ?BladeFxAuthenticationResponseTransfer
    {
        $authRequestTransfer = new BladeFxAuthenticationRequestTransfer();
        $authRequestTransfer->setUsername($this->bladeFxUsername);
        $authRequestTransfer->setPassword($this->bladeFxPassword);

        return $this->apiHandler->authenticateUser($authRequestTransfer);
    }

    /**
     * @param BladeFxReportsListRequestTransfer|null $reportsListRequestTransfer
     * @return BladeFxReportsListResponseTransfer
     */
    public function getReportList(
        ?BladeFxReportsListRequestTransfer $reportsListRequestTransfer = (new BladeFxReportsListRequestTransfer())
    ): BladeFxReportsListResponseTransfer
    {
        /** @var BladeFxReportsListRequestTransfer $reportsListRequestTransfer */
        $reportsListRequestTransfer = $this->mapTokenTransfer($reportsListRequestTransfer);

        return $this->apiHandler->getReportsList($reportsListRequestTransfer);
    }

    /**
     * @param BladeFxCategoriesListRequestTransfer|null $categoriesListRequestTransfer
     * @return BladeFxCategoriesListResponseTransfer
     */
    public function getCategoryList(
        ?BladeFxCategoriesListRequestTransfer $categoriesListRequestTransfer = (new BladeFxCategoriesListRequestTransfer())
    ): BladeFxCategoriesListResponseTransfer
    {
        /** @var BladeFxCategoriesListRequestTransfer $categoriesListRequestTransfer */
        $categoriesListRequestTransfer = $this->mapTokenTransfer($categoriesListRequestTransfer);

        return $this->apiHandler->getCategoriesList($categoriesListRequestTransfer);
    }


    public function getReportUrl(
        ?BladeFxReportParamFormRequestTransfer $reportsParamFormRequestTransfer = (new BladeFxReportParamFormRequestTransfer())
    ): BladeFxReportParamFormResponseTransfer
    {
        /** @var BladeFxReportParamFormRequestTransfer $reportsParamFormRequestTransfer */
        $reportsParamFormRequestTransfer = $this->mapTokenTransfer($reportsParamFormRequestTransfer);

        return $this->apiHandler->getReportParamForm($reportsParamFormRequestTransfer);
    }

    /**
     * @param BladeFxReportPreviewRequestTransfer $bladeFxReportPreviewRequestTransfer
     * @return BladeFxReportPreviewResponseTransfer
     */
    public function getReportPreviewURL(
        BladeFxReportPreviewRequestTransfer $bladeFxReportPreviewRequestTransfer
    ): BladeFxReportPreviewResponseTransfer
    {
        /** @var BladeFxReportPreviewRequestTransfer $bladeFxReportPreviewRequestTransfer */
        $bladeFxReportPreviewRequestTransfer = $this->mapTokenTransfer($bladeFxReportPreviewRequestTransfer);

        return $this->apiHandler->getReportPreview($bladeFxReportPreviewRequestTransfer);
    }

    public function setFavoriteReport(
        ?BladeFxSetFavoriteReportRequestTransfer $bladeFxSetFavoriteReportRequestTransfer
    ): BladeFxSetFavoriteReportResponseTransfer
    {
        /** @var BladeFxSetFavoriteReportRequestTransfer $bladeFxSetFavoriteReportRequestTransfer */
        $bladeFxSetFavoriteReportRequestTransfer = $this->mapTokenTransfer($bladeFxSetFavoriteReportRequestTransfer);

        return $this->apiHandler->setFavoriteReport($bladeFxSetFavoriteReportRequestTransfer);
    }

    protected function mapTokenTransfer(AbstractTransfer $abstractTransfer): AbstractTransfer
    {
        $tokenTransfer = new BladeFxTokenTransfer();
        $tokenTransfer->setToken($this->authenticateUser()->getToken());
        $abstractTransfer->setToken($tokenTransfer);

        return $abstractTransfer;
    }
}

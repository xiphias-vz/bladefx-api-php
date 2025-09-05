<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxApiResponseConversionResultTransfer extends AbstractTransfer
{
    private BladeFxAuthenticationResponseTransfer $bladeFxAuthenticationResponse;

    private BladeFxCategoriesListResponseTransfer $bladeFxCategoriesListResponse;

    private BladeFxReportsListResponseTransfer $bladeFxReportsListResponse;

    private BladeFxReportParamFormResponseTransfer $bladeFxReportParamFormResponseTransfer;

    private BladeFxReportPreviewResponseTransfer $bladeFxReportPreviewResponse;

    /**
     * @return BladeFxAuthenticationResponseTransfer
     */
    public function getBladeFxAuthenticationResponse(): BladeFxAuthenticationResponseTransfer
    {
        return $this->bladeFxAuthenticationResponse;
    }

    /**
     * @param BladeFxAuthenticationResponseTransfer $bladeFxAuthenticationResponse
     * @return void
     */
    public function setBladeFxAuthenticationResponse(BladeFxAuthenticationResponseTransfer $bladeFxAuthenticationResponse): void
    {
        $this->bladeFxAuthenticationResponse = $bladeFxAuthenticationResponse;
    }

    /**
     * @return BladeFxCategoriesListResponseTransfer
     */
    public function getBladeFXCategoriesListResponse(): BladeFxCategoriesListResponseTransfer
    {
        return $this->bladeFxCategoriesListResponse;
    }

    /**
     * @param BladeFxCategoriesListResponseTransfer $bladeFxCategoriesListResponse
     * @return void
     */
    public function setBladeFXCategoriesListResponse(BladeFxCategoriesListResponseTransfer $bladeFxCategoriesListResponse): void
    {
        $this->bladeFxCategoriesListResponse = $bladeFxCategoriesListResponse;
    }

    /**
     * @return BladeFxReportsListResponseTransfer
     */
    public function getBladeFXReportsListResponse(): BladeFxReportsListResponseTransfer
    {
        return $this->bladeFxReportsListResponse;
    }

    /**
     * @param BladeFxReportsListResponseTransfer $bladeFxReportsListResponse
     * @return void
     */
    public function setBladeFXReportsListResponse(BladeFxReportsListResponseTransfer $bladeFxReportsListResponse): void
    {
        $this->bladeFxReportsListResponse = $bladeFxReportsListResponse;
    }

    /**
     * @return BladeFxReportParamFormResponseTransfer
     */
    public function getBladeFxReportParamFormResponse(): BladeFxReportParamFormResponseTransfer
    {
        return $this->bladeFxReportParamFormResponseTransfer;
    }

    /**
     * @param BladeFxReportParamFormResponseTransfer $bladeFxReportParamFormResponseTransfer
     * @return void
     */
    public function setBladeFxReportParamFormResponse(BladeFxReportParamFormResponseTransfer $bladeFxReportParamFormResponseTransfer): void
    {
        $this->bladeFxReportParamFormResponseTransfer = $bladeFxReportParamFormResponseTransfer;
    }

    /**
     * @return BladeFxReportPreviewResponseTransfer
     */
    public function getBladeFxReportPreviewResponse(): BladeFxReportPreviewResponseTransfer
    {
        return $this->bladeFxReportPreviewResponse;
    }

    /**
     * @param BladeFxReportPreviewResponseTransfer $bladeFxReportPreviewResponse
     * @return void
     */
    public function setBladeFxReportPreviewResponse(BladeFxReportPreviewResponseTransfer $bladeFxReportPreviewResponse): void
    {
        $this->bladeFxReportPreviewResponse = $bladeFxReportPreviewResponse;
    }
}

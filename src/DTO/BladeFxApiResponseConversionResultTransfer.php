<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxApiResponseConversionResultTransfer extends AbstractTransfer
{
    /**
     * @var BladeFxAuthenticationResponseTransfer
     */
    private BladeFxAuthenticationResponseTransfer $bladeFxAuthenticationResponse;

    /**
     * @var BladeFxCategoriesListResponseTransfer
     */
    private BladeFxCategoriesListResponseTransfer $bladeFxCategoriesListResponse;

    /**
     * @var BladeFxReportsListResponseTransfer
     */
    private BladeFxReportsListResponseTransfer $bladeFxReportsListResponse;

    /**
     * @var BladeFxReportParamFormResponseTransfer
     */
    private BladeFxReportParamFormResponseTransfer $bladeFxReportParamFormResponse;

    /**
     * @var BladeFxReportPreviewResponseTransfer
     */
    private BladeFxReportPreviewResponseTransfer $bladeFxReportPreviewResponse;

    /**
     * @var BladeFxSetFavoriteReportResponseTransfer
     */
    private BladeFxSetFavoriteReportResponseTransfer $bladeFxSetFavoriteReportResponse;

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
        return $this->bladeFxReportParamFormResponse;
    }

    /**
     * @param BladeFxReportParamFormResponseTransfer $bladeFxReportParamFormResponse
     * @return $this
     */
    public function setBladeFxReportParamFormResponse(BladeFxReportParamFormResponseTransfer $bladeFxReportParamFormResponse): self
    {
        $this->bladeFxReportParamFormResponse = $bladeFxReportParamFormResponse;
        return $this;
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
     * @return $this
     */
    public function setBladeFxReportPreviewResponse(BladeFxReportPreviewResponseTransfer $bladeFxReportPreviewResponse): self
    {
        $this->bladeFxReportPreviewResponse = $bladeFxReportPreviewResponse;
        return $this;
    }

    /**
     * @return BladeFxSetFavoriteReportResponseTransfer
     */
    public function getBladeFxSetFavoriteReportResponse(): BladeFxSetFavoriteReportResponseTransfer
    {
        return $this->bladeFxSetFavoriteReportResponse;
    }

    /**
     * @param BladeFxSetFavoriteReportResponseTransfer $bladeFxSetFavoriteReportResponse
     * @return $this
     */
    public function setBladeFxSetFavoriteReportResponse(BladeFxSetFavoriteReportResponseTransfer $bladeFxSetFavoriteReportResponse): self
    {
        $this->bladeFxSetFavoriteReportResponse = $bladeFxSetFavoriteReportResponse;
        return $this;
    }
}

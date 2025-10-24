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
     * @var BladeFxGetReportsListResponseTransfer
     */
    private BladeFxGetReportsListResponseTransfer $bladeFxReportsListResponse;

    /**
     * @var BladeFxGetReportParamFormResponseTransfer
     */
    private BladeFxGetReportParamFormResponseTransfer $bladeFxReportParamFormResponse;

    /**
     * @var BladeFxReportPreviewResponseTransfer
     */
    private BladeFxReportPreviewResponseTransfer $bladeFxReportPreviewResponse;

    /**
     * @var BladeFxSetFavoriteReportResponseTransfer
     */
    private BladeFxSetFavoriteReportResponseTransfer $bladeFxSetFavoriteReportResponse;

    /**
     * @var BladeFxCreateOrUpdateUserResponseTransfer
     */
    private BladeFxCreateOrUpdateUserResponseTransfer $bladeFxCreateOrUpdateUserResponse;

    /**
     * @var BladeFxUpdatePasswordResponseTransfer
     */
    private BladeFxUpdatePasswordResponseTransfer $bladeFxUpdatePasswordResponse;

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
     * @return BladeFxGetReportsListResponseTransfer
     */
    public function getBladeFXReportsListResponse(): BladeFxGetReportsListResponseTransfer
    {
        return $this->bladeFxReportsListResponse;
    }

    /**
     * @param BladeFxGetReportsListResponseTransfer $bladeFxReportsListResponse
     * @return void
     */
    public function setBladeFXReportsListResponse(BladeFxGetReportsListResponseTransfer $bladeFxReportsListResponse): void
    {
        $this->bladeFxReportsListResponse = $bladeFxReportsListResponse;
    }

    /**
     * @return BladeFxGetReportParamFormResponseTransfer
     */
    public function getBladeFxReportParamFormResponse(): BladeFxGetReportParamFormResponseTransfer
    {
        return $this->bladeFxReportParamFormResponse;
    }

    /**
     * @param BladeFxGetReportParamFormResponseTransfer $bladeFxReportParamFormResponse
     * @return $this
     */
    public function setBladeFxReportParamFormResponse(BladeFxGetReportParamFormResponseTransfer $bladeFxReportParamFormResponse): self
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

    /**
     * @return BladeFxCreateOrUpdateUserResponseTransfer
     */
    public function getBladeFxCreateOrUpdateUserResponse(): BladeFxCreateOrUpdateUserResponseTransfer
    {
        return $this->bladeFxCreateOrUpdateUserResponse;
    }

    /**
     * @param BladeFxCreateOrUpdateUserResponseTransfer $bladeFxCreateOrUpdateUserResponse
     * @return $this
     */
    public function setBladeFxCreateOrUpdateUserResponse(BladeFxCreateOrUpdateUserResponseTransfer $bladeFxCreateOrUpdateUserResponse): self
    {
        $this->bladeFxCreateOrUpdateUserResponse = $bladeFxCreateOrUpdateUserResponse;
        return $this;
    }


    /**
     * @return BladeFxUpdatePasswordResponseTransfer
     */
    public function getBladeFxUpdatePasswordResponse(): BladeFxUpdatePasswordResponseTransfer
    {
        return $this->bladeFxUpdatePasswordResponse;
    }

    /**
     * @param BladeFxUpdatePasswordResponseTransfer $bladeFxUpdatePasswordResponse
     * @return $this
     */
    public function setBladeFxUpdatePasswordResponse(BladeFxUpdatePasswordResponseTransfer $bladeFxUpdatePasswordResponse): self
    {
        $this->bladeFxUpdatePasswordResponse = $bladeFxUpdatePasswordResponse;
        return $this;
    }
}

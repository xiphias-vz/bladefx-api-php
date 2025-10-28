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
     * @var BladeFxGetReportPreviewResponseTransfer
     */
    private BladeFxGetReportPreviewResponseTransfer $bladeFxReportPreviewResponse;

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
     * @return $this
     */
    public function setBladeFxAuthenticationResponse(BladeFxAuthenticationResponseTransfer $bladeFxAuthenticationResponse): self
    {
        $this->bladeFxAuthenticationResponse = $bladeFxAuthenticationResponse;

        return $this;
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
     * @return $this
     */
    public function setBladeFXCategoriesListResponse(BladeFxCategoriesListResponseTransfer $bladeFxCategoriesListResponse): self
    {
        $this->bladeFxCategoriesListResponse = $bladeFxCategoriesListResponse;

        return $this;
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
     * @return $this
     */
    public function setBladeFXReportsListResponse(BladeFxGetReportsListResponseTransfer $bladeFxReportsListResponse): self
    {
        $this->bladeFxReportsListResponse = $bladeFxReportsListResponse;

        return $this;
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
     * @return BladeFxGetReportPreviewResponseTransfer
     */
    public function getBladeFxReportPreviewResponse(): BladeFxGetReportPreviewResponseTransfer
    {
        return $this->bladeFxReportPreviewResponse;
    }

    /**
     * @param BladeFxGetReportPreviewResponseTransfer $bladeFxReportPreviewResponse
     * @return $this
     */
    public function setBladeFxReportPreviewResponse(BladeFxGetReportPreviewResponseTransfer $bladeFxReportPreviewResponse): self
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

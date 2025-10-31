<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxApiResponseConversionResultTransfer extends AbstractTransfer
{
    /**
     * @var BladeFxAuthenticationResponseTransfer|null
     */
    private ?BladeFxAuthenticationResponseTransfer $bladeFxAuthenticationResponse = null;

    /**
     * @var BladeFxCategoriesListResponseTransfer|null
     */
    private ?BladeFxCategoriesListResponseTransfer $bladeFxCategoriesListResponse = null;

    /**
     * @var BladeFxGetReportsListResponseTransfer|null
     */
    private ?BladeFxGetReportsListResponseTransfer $bladeFxReportsListResponse = null;

    /**
     * @var BladeFxGetReportParamFormResponseTransfer|null
     */
    private ?BladeFxGetReportParamFormResponseTransfer $bladeFxReportParamFormResponse = null;

    /**
     * @var BladeFxGetReportPreviewResponseTransfer|null
     */
    private ?BladeFxGetReportPreviewResponseTransfer $bladeFxReportPreviewResponse = null;

    /**
     * @var BladeFxSetFavoriteReportResponseTransfer|null
     */
    private ?BladeFxSetFavoriteReportResponseTransfer $bladeFxSetFavoriteReportResponse = null;

    /**
     * @var BladeFxCreateOrUpdateUserResponseTransfer|null
     */
    private ?BladeFxCreateOrUpdateUserResponseTransfer $bladeFxCreateOrUpdateUserResponse = null;

    /**
     * @var BladeFxUpdatePasswordResponseTransfer|null
     */
    private ?BladeFxUpdatePasswordResponseTransfer $bladeFxUpdatePasswordResponse = null;

    /**
     * @var BladeFxGetReportByFormatResponseTransfer|null
     */
    private ?BladeFxGetReportByFormatResponseTransfer $bladeFxGetReportByFormatResponse = null;

    /**
     * @return BladeFxAuthenticationResponseTransfer|null
     */
    public function getBladeFxAuthenticationResponse(): ?BladeFxAuthenticationResponseTransfer
    {
        return $this->bladeFxAuthenticationResponse;
    }

    /**
     * @param BladeFxAuthenticationResponseTransfer|null $bladeFxAuthenticationResponse
     * @return $this
     */
    public function setBladeFxAuthenticationResponse(?BladeFxAuthenticationResponseTransfer $bladeFxAuthenticationResponse): self
    {
        $this->bladeFxAuthenticationResponse = $bladeFxAuthenticationResponse;

        return $this;
    }

    /**
     * @return BladeFxCategoriesListResponseTransfer|null
     */
    public function getBladeFXCategoriesListResponse(): ?BladeFxCategoriesListResponseTransfer
    {
        return $this->bladeFxCategoriesListResponse;
    }

    /**
     * @param BladeFxCategoriesListResponseTransfer|null $bladeFxCategoriesListResponse
     * @return $this
     */
    public function setBladeFXCategoriesListResponse(?BladeFxCategoriesListResponseTransfer $bladeFxCategoriesListResponse): self
    {
        $this->bladeFxCategoriesListResponse = $bladeFxCategoriesListResponse;

        return $this;
    }

    /**
     * @return BladeFxGetReportsListResponseTransfer|null
     */
    public function getBladeFXReportsListResponse(): ?BladeFxGetReportsListResponseTransfer
    {
        return $this->bladeFxReportsListResponse;
    }

    /**
     * @param BladeFxGetReportsListResponseTransfer|null $bladeFxReportsListResponse
     * @return $this
     */
    public function setBladeFXReportsListResponse(?BladeFxGetReportsListResponseTransfer $bladeFxReportsListResponse): self
    {
        $this->bladeFxReportsListResponse = $bladeFxReportsListResponse;

        return $this;
    }

    /**
     * @return BladeFxGetReportParamFormResponseTransfer|null
     */
    public function getBladeFxReportParamFormResponse(): ?BladeFxGetReportParamFormResponseTransfer
    {
        return $this->bladeFxReportParamFormResponse;
    }

    /**
     * @param BladeFxGetReportParamFormResponseTransfer|null $bladeFxReportParamFormResponse
     * @return $this
     */
    public function setBladeFxReportParamFormResponse(?BladeFxGetReportParamFormResponseTransfer $bladeFxReportParamFormResponse): self
    {
        $this->bladeFxReportParamFormResponse = $bladeFxReportParamFormResponse;
        return $this;
    }

    /**
     * @return BladeFxGetReportPreviewResponseTransfer|null
     */
    public function getBladeFxReportPreviewResponse(): ?BladeFxGetReportPreviewResponseTransfer
    {
        return $this->bladeFxReportPreviewResponse;
    }

    /**
     * @param BladeFxGetReportPreviewResponseTransfer|null $bladeFxReportPreviewResponse
     * @return $this
     */
    public function setBladeFxReportPreviewResponse(?BladeFxGetReportPreviewResponseTransfer $bladeFxReportPreviewResponse): self
    {
        $this->bladeFxReportPreviewResponse = $bladeFxReportPreviewResponse;
        return $this;
    }

    /**
     * @return BladeFxSetFavoriteReportResponseTransfer|null
     */
    public function getBladeFxSetFavoriteReportResponse(): ?BladeFxSetFavoriteReportResponseTransfer
    {
        return $this->bladeFxSetFavoriteReportResponse;
    }

    /**
     * @param BladeFxSetFavoriteReportResponseTransfer|null $bladeFxSetFavoriteReportResponse
     * @return $this
     */
    public function setBladeFxSetFavoriteReportResponse(?BladeFxSetFavoriteReportResponseTransfer $bladeFxSetFavoriteReportResponse): self
    {
        $this->bladeFxSetFavoriteReportResponse = $bladeFxSetFavoriteReportResponse;
        return $this;
    }

    /**
     * @return BladeFxCreateOrUpdateUserResponseTransfer|null
     */
    public function getBladeFxCreateOrUpdateUserResponse(): ?BladeFxCreateOrUpdateUserResponseTransfer
    {
        return $this->bladeFxCreateOrUpdateUserResponse;
    }

    /**
     * @param BladeFxCreateOrUpdateUserResponseTransfer|null $bladeFxCreateOrUpdateUserResponse
     * @return $this
     */
    public function setBladeFxCreateOrUpdateUserResponse(?BladeFxCreateOrUpdateUserResponseTransfer $bladeFxCreateOrUpdateUserResponse): self
    {
        $this->bladeFxCreateOrUpdateUserResponse = $bladeFxCreateOrUpdateUserResponse;
        return $this;
    }

    /**
     * @return BladeFxUpdatePasswordResponseTransfer|null
     */
    public function getBladeFxUpdatePasswordResponse(): ?BladeFxUpdatePasswordResponseTransfer
    {
        return $this->bladeFxUpdatePasswordResponse;
    }

    /**
     * @param BladeFxUpdatePasswordResponseTransfer|null $bladeFxUpdatePasswordResponse
     * @return $this
     */
    public function setBladeFxUpdatePasswordResponse(?BladeFxUpdatePasswordResponseTransfer $bladeFxUpdatePasswordResponse): self
    {
        $this->bladeFxUpdatePasswordResponse = $bladeFxUpdatePasswordResponse;
        return $this;
    }

    /**
     * @return BladeFxGetReportByFormatResponseTransfer|null
     */
    public function getBladeFxGetReportByFormatResponse(): ?BladeFxGetReportByFormatResponseTransfer
    {
        return $this->bladeFxGetReportByFormatResponse;
    }

    /**
     * @param BladeFxGetReportByFormatResponseTransfer|null $bladeFxGetReportByFormatResponse
     * @return $this
     */
    public function setBladeFxGetReportByFormatResponse(?BladeFxGetReportByFormatResponseTransfer $bladeFxGetReportByFormatResponse): self
    {
        $this->bladeFxGetReportByFormatResponse = $bladeFxGetReportByFormatResponse;
        return $this;
    }
}

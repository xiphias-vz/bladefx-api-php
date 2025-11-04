<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxApiResponseConversionResultTransfer extends AbstractTransfer
{
    /**
     * @var \Xiphias\BladeFxApi\DTO\BladeFxAuthenticationResponseTransfer|null
     */
    private ?BladeFxAuthenticationResponseTransfer $bladeFxAuthenticationResponse = null;

    /**
     * @var \Xiphias\BladeFxApi\DTO\BladeFxCategoriesListResponseTransfer|null
     */
    private ?BladeFxCategoriesListResponseTransfer $bladeFxCategoriesListResponse = null;

    /**
     * @var \Xiphias\BladeFxApi\DTO\BladeFxGetReportsListResponseTransfer|null
     */
    private ?BladeFxGetReportsListResponseTransfer $bladeFxReportsListResponse = null;

    /**
     * @var \Xiphias\BladeFxApi\DTO\BladeFxGetReportParamFormResponseTransfer|null
     */
    private ?BladeFxGetReportParamFormResponseTransfer $bladeFxReportParamFormResponse = null;

    /**
     * @var \Xiphias\BladeFxApi\DTO\BladeFxGetReportPreviewResponseTransfer|null
     */
    private ?BladeFxGetReportPreviewResponseTransfer $bladeFxReportPreviewResponse = null;

    /**
     * @var \Xiphias\BladeFxApi\DTO\BladeFxSetFavoriteReportResponseTransfer|null
     */
    private ?BladeFxSetFavoriteReportResponseTransfer $bladeFxSetFavoriteReportResponse = null;

    /**
     * @var \Xiphias\BladeFxApi\DTO\BladeFxCreateOrUpdateUserResponseTransfer|null
     */
    private ?BladeFxCreateOrUpdateUserResponseTransfer $bladeFxCreateOrUpdateUserResponse = null;

    /**
     * @var \Xiphias\BladeFxApi\DTO\BladeFxUpdatePasswordResponseTransfer|null
     */
    private ?BladeFxUpdatePasswordResponseTransfer $bladeFxUpdatePasswordResponse = null;

    /**
     * @var \Xiphias\BladeFxApi\DTO\BladeFxGetReportByFormatResponseTransfer|null
     */
    private ?BladeFxGetReportByFormatResponseTransfer $bladeFxGetReportByFormatResponse = null;

    /**
     * @return \Xiphias\BladeFxApi\DTO\BladeFxAuthenticationResponseTransfer|null
     */
    public function getBladeFxAuthenticationResponse(): ?BladeFxAuthenticationResponseTransfer
    {
        return $this->bladeFxAuthenticationResponse;
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxAuthenticationResponseTransfer|null $bladeFxAuthenticationResponse
     *
     * @return $this
     */
    public function setBladeFxAuthenticationResponse(?BladeFxAuthenticationResponseTransfer $bladeFxAuthenticationResponse)
    {
        $this->bladeFxAuthenticationResponse = $bladeFxAuthenticationResponse;

        return $this;
    }

    /**
     * @return \Xiphias\BladeFxApi\DTO\BladeFxCategoriesListResponseTransfer|null
     */
    public function getBladeFXCategoriesListResponse(): ?BladeFxCategoriesListResponseTransfer
    {
        return $this->bladeFxCategoriesListResponse;
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxCategoriesListResponseTransfer|null $bladeFxCategoriesListResponse
     *
     * @return $this
     */
    public function setBladeFXCategoriesListResponse(?BladeFxCategoriesListResponseTransfer $bladeFxCategoriesListResponse)
    {
        $this->bladeFxCategoriesListResponse = $bladeFxCategoriesListResponse;

        return $this;
    }

    /**
     * @return \Xiphias\BladeFxApi\DTO\BladeFxGetReportsListResponseTransfer|null
     */
    public function getBladeFXReportsListResponse(): ?BladeFxGetReportsListResponseTransfer
    {
        return $this->bladeFxReportsListResponse;
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxGetReportsListResponseTransfer|null $bladeFxReportsListResponse
     *
     * @return $this
     */
    public function setBladeFXReportsListResponse(?BladeFxGetReportsListResponseTransfer $bladeFxReportsListResponse)
    {
        $this->bladeFxReportsListResponse = $bladeFxReportsListResponse;

        return $this;
    }

    /**
     * @return \Xiphias\BladeFxApi\DTO\BladeFxGetReportParamFormResponseTransfer|null
     */
    public function getBladeFxReportParamFormResponse(): ?BladeFxGetReportParamFormResponseTransfer
    {
        return $this->bladeFxReportParamFormResponse;
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxGetReportParamFormResponseTransfer|null $bladeFxReportParamFormResponse
     *
     * @return $this
     */
    public function setBladeFxReportParamFormResponse(?BladeFxGetReportParamFormResponseTransfer $bladeFxReportParamFormResponse)
    {
        $this->bladeFxReportParamFormResponse = $bladeFxReportParamFormResponse;

        return $this;
    }

    /**
     * @return \Xiphias\BladeFxApi\DTO\BladeFxGetReportPreviewResponseTransfer|null
     */
    public function getBladeFxReportPreviewResponse(): ?BladeFxGetReportPreviewResponseTransfer
    {
        return $this->bladeFxReportPreviewResponse;
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxGetReportPreviewResponseTransfer|null $bladeFxReportPreviewResponse
     *
     * @return $this
     */
    public function setBladeFxReportPreviewResponse(?BladeFxGetReportPreviewResponseTransfer $bladeFxReportPreviewResponse)
    {
        $this->bladeFxReportPreviewResponse = $bladeFxReportPreviewResponse;

        return $this;
    }

    /**
     * @return \Xiphias\BladeFxApi\DTO\BladeFxSetFavoriteReportResponseTransfer|null
     */
    public function getBladeFxSetFavoriteReportResponse(): ?BladeFxSetFavoriteReportResponseTransfer
    {
        return $this->bladeFxSetFavoriteReportResponse;
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxSetFavoriteReportResponseTransfer|null $bladeFxSetFavoriteReportResponse
     *
     * @return $this
     */
    public function setBladeFxSetFavoriteReportResponse(?BladeFxSetFavoriteReportResponseTransfer $bladeFxSetFavoriteReportResponse)
    {
        $this->bladeFxSetFavoriteReportResponse = $bladeFxSetFavoriteReportResponse;

        return $this;
    }

    /**
     * @return \Xiphias\BladeFxApi\DTO\BladeFxCreateOrUpdateUserResponseTransfer|null
     */
    public function getBladeFxCreateOrUpdateUserResponse(): ?BladeFxCreateOrUpdateUserResponseTransfer
    {
        return $this->bladeFxCreateOrUpdateUserResponse;
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxCreateOrUpdateUserResponseTransfer|null $bladeFxCreateOrUpdateUserResponse
     *
     * @return $this
     */
    public function setBladeFxCreateOrUpdateUserResponse(?BladeFxCreateOrUpdateUserResponseTransfer $bladeFxCreateOrUpdateUserResponse)
    {
        $this->bladeFxCreateOrUpdateUserResponse = $bladeFxCreateOrUpdateUserResponse;

        return $this;
    }

    /**
     * @return \Xiphias\BladeFxApi\DTO\BladeFxUpdatePasswordResponseTransfer|null
     */
    public function getBladeFxUpdatePasswordResponse(): ?BladeFxUpdatePasswordResponseTransfer
    {
        return $this->bladeFxUpdatePasswordResponse;
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxUpdatePasswordResponseTransfer|null $bladeFxUpdatePasswordResponse
     *
     * @return $this
     */
    public function setBladeFxUpdatePasswordResponse(?BladeFxUpdatePasswordResponseTransfer $bladeFxUpdatePasswordResponse)
    {
        $this->bladeFxUpdatePasswordResponse = $bladeFxUpdatePasswordResponse;

        return $this;
    }

    /**
     * @return \Xiphias\BladeFxApi\DTO\BladeFxGetReportByFormatResponseTransfer|null
     */
    public function getBladeFxGetReportByFormatResponse(): ?BladeFxGetReportByFormatResponseTransfer
    {
        return $this->bladeFxGetReportByFormatResponse;
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxGetReportByFormatResponseTransfer|null $bladeFxGetReportByFormatResponse
     *
     * @return $this
     */
    public function setBladeFxGetReportByFormatResponse(?BladeFxGetReportByFormatResponseTransfer $bladeFxGetReportByFormatResponse)
    {
        $this->bladeFxGetReportByFormatResponse = $bladeFxGetReportByFormatResponse;

        return $this;
    }
}

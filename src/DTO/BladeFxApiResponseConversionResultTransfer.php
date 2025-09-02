<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxApiResponseConversionResultTransfer extends AbstractTransfer
{
    private BladeFXCategoriesListResponseTransfer $bladeFxCategoriesListResponse;

    /**
     * @return BladeFXCategoriesListResponseTransfer
     */
    public function getBladeFXCategoriesListResponse(): BladeFXCategoriesListResponseTransfer
    {
        return $this->bladeFxCategoriesListResponse;
    }

    /**
     * @param BladeFXCategoriesListResponseTransfer $bladeFxCategoriesListResponse
     * @return void
     */
    public function setBladeFXCategoriesListResponse(BladeFXCategoriesListResponseTransfer $bladeFxCategoriesListResponse): void
    {
        $this->bladeFxCategoriesListResponse = $bladeFxCategoriesListResponse;
    }
}

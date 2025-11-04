<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Response\Converter;

use Xiphias\BladeFxApi\DTO\BladeFxApiResponseConversionResultTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxCategoriesListResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxCategoryTransfer;

class CategoriesListResponseConverter extends AbstractResponseConverter
{
    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxApiResponseConversionResultTransfer $apiResponseConversionResultTransfer
     * @param array<mixed> $responseData
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxApiResponseConversionResultTransfer
     */
    public function expandConversionResponseTransfer(
        BladeFxApiResponseConversionResultTransfer $apiResponseConversionResultTransfer,
        array $responseData
    ): BladeFxApiResponseConversionResultTransfer {
        $bladeFxCategoriesListResponseTransfer = new BladeFxCategoriesListResponseTransfer();
        $bladeFxCategoryList = [];
        foreach ($responseData as $category) {
            if (is_array($category)) {
                $bladeFxCategory = new BladeFxCategoryTransfer();
                $bladeFxCategory->fromArray($category, true);
                $bladeFxCategoryList[] = $bladeFxCategory;
            }
        }

        $bladeFxCategoriesListResponseTransfer->setCategoriesList($bladeFxCategoryList);
        $apiResponseConversionResultTransfer->setBladeFxCategoriesListResponse($bladeFxCategoriesListResponseTransfer);

        return $apiResponseConversionResultTransfer;
    }
}

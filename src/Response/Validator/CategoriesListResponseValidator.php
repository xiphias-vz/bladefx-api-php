<?php


namespace Xiphias\BladeFxApi\Response\Validator;

use Xiphias\BladeFxApi\DTO\AbstractTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxCategoriesListResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportPreviewResponseTransfer;

class CategoriesListResponseValidator extends AbstractResponseValidator
{
    /**
     * @return string
     */
    public function getResponseTransferClass(): string
    {
        return BladeFxCategoriesListResponseTransfer::class;
    }

    /**
     * @param AbstractTransfer $responseTransfer
     * @return bool
     */
    protected function validateResponse(AbstractTransfer $responseTransfer): bool
    {
        try {
            /** @var BladeFxCategoriesListResponseTransfer $responseTransfer */
            foreach ($responseTransfer->getCategoriesList() as $category) {
                $category
                    ->requireCatId();
            }
        } catch (\Exception $ex) {
            return false;
        }

        return true;
    }
}

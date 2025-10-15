<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Response\Validator;

use Xiphias\BladeFxApi\DTO\AbstractTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxCategoriesListResponseTransfer;
use Xiphias\BladeFxApi\Exception\TransferPropertyRequiredException;

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
            $categoriesList = $responseTransfer->getCategoriesList();
            foreach ($categoriesList as $category) {
                $category
                    ->requireCatId();
            }
        } catch (TransferPropertyRequiredException $ex) {
            return false;
        }

        return true;
    }
}

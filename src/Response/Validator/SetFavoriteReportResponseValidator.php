<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Response\Validator;

use Xiphias\BladeFxApi\DTO\AbstractTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxSetFavoriteReportResponseTransfer;
use Xiphias\BladeFxApi\Exception\TransferPropertyRequiredException;

class SetFavoriteReportResponseValidator extends AbstractResponseValidator
{
    /**
     * @return string
     */
    protected function getResponseTransferClass(): string
    {
        return BladeFxSetFavoriteReportResponseTransfer::class;
    }

    /**
     * @param AbstractTransfer $responseTransfer
     * @return bool
     */
    protected function validateResponse(AbstractTransfer $responseTransfer): bool
    {
        try {
            /**
             * @var BladeFxSetFavoriteReportResponseTransfer $responseTransfer
             */
            $responseTransfer->requireRMessage();
        } catch (TransferPropertyRequiredException $ex) {
            return false;
        }

        return true;
    }
}

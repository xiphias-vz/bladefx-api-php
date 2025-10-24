<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Response\Validator;

use Xiphias\BladeFxApi\DTO\AbstractTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxSetFavoriteReportResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxUpdatePasswordResponseTransfer;
use Xiphias\BladeFxApi\Exception\TransferPropertyRequiredException;

class UpdatePasswordOnBladeFxResponseValidator extends AbstractResponseValidator
{
    /**
     * @return string
     */
    protected function getResponseTransferClass(): string
    {
        return BladeFxUpdatePasswordResponseTransfer::class;
    }

    /**
     * @param AbstractTransfer $responseTransfer
     * @return bool
     */
    protected function validateResponse(AbstractTransfer $responseTransfer): bool
    {
        try {
            /**
             * @var BladeFxUpdatePasswordResponseTransfer $responseTransfer
             */
            $responseTransfer->requireSuccess();
        } catch (TransferPropertyRequiredException $ex) {
            return false;
        }

        return true;
    }
}

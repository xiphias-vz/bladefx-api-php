<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Response\Validator;

use Xiphias\BladeFxApi\DTO\AbstractTransfer;
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
     * @param \Xiphias\BladeFxApi\DTO\AbstractTransfer $responseTransfer
     *
     * @return bool
     */
    protected function validateResponse(AbstractTransfer $responseTransfer): bool
    {
        try {
            /** @var \Xiphias\BladeFxApi\DTO\BladeFxUpdatePasswordResponseTransfer $bladeFxUpdatePasswordResponseTransfer */
            $bladeFxUpdatePasswordResponseTransfer = $responseTransfer;

            $bladeFxUpdatePasswordResponseTransfer->requireSuccess();
        } catch (TransferPropertyRequiredException $ex) {
            return false;
        }

        return true;
    }
}

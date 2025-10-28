<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Response\Validator;

use Xiphias\BladeFxApi\DTO\AbstractTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxCreateOrUpdateUserResponseTransfer;
use Xiphias\BladeFxApi\Exception\TransferPropertyRequiredException;

class CreateOrUpdateUserOnBladeFxResponseValidator extends AbstractResponseValidator
{
    /**
     * @return string
     */
    protected function getResponseTransferClass(): string
    {
        return BladeFxCreateOrUpdateUserResponseTransfer::class;
    }

    /**
     * @param AbstractTransfer $responseTransfer
     * @return bool
     */
    protected function validateResponse(AbstractTransfer $responseTransfer): bool
    {
        try {
            /**
             * @var BladeFxCreateOrUpdateUserResponseTransfer $responseTransfer
             */
            $responseTransfer->requireSuccess();
            $responseTransfer->requireId();
            $responseTransfer->requireLicenceIssue();
        } catch (TransferPropertyRequiredException $ex) {
            return false;
        }

        return true;
    }
}

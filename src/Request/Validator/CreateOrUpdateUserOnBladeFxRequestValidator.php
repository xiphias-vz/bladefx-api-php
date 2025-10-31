<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Request\Validator;

use Xiphias\BladeFxApi\DTO\AbstractTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxCreateOrUpdateUserRequestTransfer;
use Xiphias\BladeFxApi\Exception\TransferPropertyRequiredException;

class CreateOrUpdateUserOnBladeFxRequestValidator extends AbstractRequestValidator
{
    /**
     * @return string
     */
    protected function getRequestTransferClass(): string
    {
        return BladeFxCreateOrUpdateUserRequestTransfer::class;
    }

    /**
     * @param AbstractTransfer $requestTransfer
     * @return bool
     */
    protected function validateRequest(AbstractTransfer $requestTransfer): bool
    {
        try {
            /**
             * @var BladeFxCreateOrUpdateUserRequestTransfer $requestTransfer
             */
            $requestTransfer
                ->requireAccessToken();
        } catch (TransferPropertyRequiredException $ex) {
            return false;
        }

        return true;
    }
}

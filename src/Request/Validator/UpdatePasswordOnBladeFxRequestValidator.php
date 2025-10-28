<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Request\Validator;

use Xiphias\BladeFxApi\DTO\AbstractTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxUpdatePasswordRequestTransfer;
use Xiphias\BladeFxApi\Exception\TransferPropertyRequiredException;

class UpdatePasswordOnBladeFxRequestValidator extends AbstractRequestValidator
{
    /**
     * @return string
     */
    protected function getRequestTransferClass(): string
    {
        return BladeFxUpdatePasswordRequestTransfer::class;
    }

    /**
     * @param AbstractTransfer|BladeFxUpdatePasswordRequestTransfer $requestTransfer
     * @return bool
     */
    protected function validateRequest(AbstractTransfer|BladeFxUpdatePasswordRequestTransfer $requestTransfer): bool
    {
        try {
            /**
             * @var BladeFxUpdatePasswordRequestTransfer $requestTransfer
             */
            $requestTransfer
                ->requireToken()
                ->requirePassword()
                ->requireBladeFxUserId();
        } catch (TransferPropertyRequiredException $ex) {
            return false;
        }

        return true;
    }
}

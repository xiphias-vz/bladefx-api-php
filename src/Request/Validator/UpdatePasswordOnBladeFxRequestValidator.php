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
     * @param \Xiphias\BladeFxApi\DTO\AbstractTransfer|\Xiphias\BladeFxApi\DTO\BladeFxUpdatePasswordRequestTransfer $requestTransfer
     *
     * @return bool
     */
    protected function validateRequest(AbstractTransfer|BladeFxUpdatePasswordRequestTransfer $requestTransfer): bool
    {
        try {
            /** @var \Xiphias\BladeFxApi\DTO\BladeFxUpdatePasswordRequestTransfer $bladeFxUpdatePasswordRequestTransfer */
            $bladeFxUpdatePasswordRequestTransfer = $requestTransfer;

            $bladeFxUpdatePasswordRequestTransfer
                ->requireAccessToken()
                ->requirePassword()
                ->requireBladeFxUserId();
        } catch (TransferPropertyRequiredException $ex) {
            return false;
        }

        return true;
    }
}

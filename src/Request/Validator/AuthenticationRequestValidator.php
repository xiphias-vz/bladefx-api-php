<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Request\Validator;

use Xiphias\BladeFxApi\DTO\AbstractTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxAuthenticationRequestTransfer;
use Xiphias\BladeFxApi\Exception\TransferPropertyRequiredException;

class AuthenticationRequestValidator extends AbstractRequestValidator
{
    /**
     * @return string
     */
    protected function getRequestTransferClass(): string
    {
        return BladeFxAuthenticationRequestTransfer::class;
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\AbstractTransfer $requestTransfer
     *
     * @return bool
     */
    protected function validateRequest(AbstractTransfer $requestTransfer): bool
    {
        try {
            /** @var \Xiphias\BladeFxApi\DTO\BladeFxAuthenticationRequestTransfer $bladeFxAuthenticationRequestTransfer */
            $bladeFxAuthenticationRequestTransfer = $requestTransfer;

            $bladeFxAuthenticationRequestTransfer
                ->requireUsername()
                ->requirePassword();
        } catch (TransferPropertyRequiredException $ex) {
            return false;
        }

        return true;
    }
}

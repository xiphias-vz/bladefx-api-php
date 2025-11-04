<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Response\Validator;

use Xiphias\BladeFxApi\DTO\AbstractTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxAuthenticationResponseTransfer;
use Xiphias\BladeFxApi\Exception\TransferPropertyRequiredException;

class AuthenticationResponseValidator extends AbstractResponseValidator
{
    /**
     * @return string
     */
    protected function getResponseTransferClass(): string
    {
        return BladeFxAuthenticationResponseTransfer::class;
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\AbstractTransfer $responseTransfer
     *
     * @return bool
     */
    protected function validateResponse(AbstractTransfer $responseTransfer): bool
    {
        try {
            /** @var \Xiphias\BladeFxApi\DTO\BladeFxAuthenticationResponseTransfer $bladeFxAuthenticationResponseTransfer */
            $bladeFxAuthenticationResponseTransfer = $responseTransfer;

            $bladeFxAuthenticationResponseTransfer
                ->requireAccessToken()
                ->requireUsername()
                ->requireEmail()
                ->requireFullname()
                ->requireIdCompany()
                ->requireIdLanguage();
        } catch (TransferPropertyRequiredException $ex) {
            return false;
        }

        return true;
    }
}

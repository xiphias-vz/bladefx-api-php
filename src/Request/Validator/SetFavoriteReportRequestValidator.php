<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Request\Validator;

use Xiphias\BladeFxApi\DTO\AbstractTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxSetFavoriteReportRequestTransfer;
use Xiphias\BladeFxApi\Exception\TransferPropertyRequiredException;

class SetFavoriteReportRequestValidator extends AbstractRequestValidator
{
    /**
     * @return string
     */
    protected function getRequestTransferClass(): string
    {
        return BladeFxSetFavoriteReportRequestTransfer::class;
    }

    /**
     * @param AbstractTransfer $requestTransfer
     * @return bool
     */
    protected function validateRequest(AbstractTransfer $requestTransfer): bool
    {
        try {
            /**
             * @var BladeFxSetFavoriteReportRequestTransfer $requestTransfer
             */
            $requestTransfer
                ->requireAccessToken()
                ->requireRepId()
                ->requireUserId();
        } catch (TransferPropertyRequiredException $ex) {
            return false;
        }

        return true;
    }
}

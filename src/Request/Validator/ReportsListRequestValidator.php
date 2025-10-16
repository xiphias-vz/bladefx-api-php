<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Request\Validator;

use Xiphias\BladeFxApi\DTO\BladeFxGetReportsListRequestTransfer;
use Xiphias\BladeFxApi\Exception\TransferPropertyRequiredException;
use Xiphias\BladeFxApi\DTO\AbstractTransfer;

class ReportsListRequestValidator extends AbstractRequestValidator
{
    /**
     * @return string
     */
    public function getRequestTransferClass(): string
    {
        return BladeFxGetReportsListRequestTransfer::class;
    }

    /**
     * @param AbstractTransfer $requestTransfer
     * @return bool
     */
    public function validateRequest(AbstractTransfer $requestTransfer): bool
    {
        try {
            /**
             * @var BladeFxGetReportsListRequestTransfer $requestTransfer
             */
            $requestTransfer
                ->requireToken()
                ->requireReturnType();
        } catch (TransferPropertyRequiredException $ex) {
            return false;
        }

        return true;
    }
}

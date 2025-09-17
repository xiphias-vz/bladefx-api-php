<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Request\Validator;

use Xiphias\BladeFxApi\DTO\BladeFxReportsListRequestTransfer;
use Xiphias\BladeFxApi\Exception\TransferPropertyRequiredException;
use Xiphias\BladeFxApi\DTO\AbstractTransfer;

class ReportsListRequestValidator extends AbstractRequestValidator
{
    /**
     * @return string
     */
    public function getRequestTransferClass(): string
    {
        return BladeFxReportsListRequestTransfer::class;
    }

    /**
     * @param AbstractTransfer $requestTransfer
     * @return bool
     */
    public function validateRequest(AbstractTransfer $requestTransfer): bool
    {
        try {
            /**
             * @var BladeFxReportsListRequestTransfer $requestTransfer
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

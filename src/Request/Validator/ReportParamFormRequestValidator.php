<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Request\Validator;

use Xiphias\BladeFxApi\DTO\AbstractTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportParamFormRequestTransfer;
use Xiphias\BladeFxApi\Exception\TransferPropertyRequiredException;

class ReportParamFormRequestValidator extends AbstractRequestValidator
{
    /**
     * @return string
     */
    public function getRequestTransferClass(): string
    {
        return BladeFxGetReportParamFormRequestTransfer::class;
    }

    /**
     * @param AbstractTransfer $requestTransfer
     * @return bool
     */
    public function validateRequest(AbstractTransfer $requestTransfer): bool
    {
        try {
            /** @var BladeFxGetReportParamFormRequestTransfer $requestTransfer */
            $requestTransfer
                ->requireAccessToken()
                ->requireRootUrl();
        } catch (TransferPropertyRequiredException $ex) {
            return false;
        }

        return true;
    }
}

<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Request\Validator;

use Xiphias\BladeFxApi\DTO\AbstractTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportByFormatRequestTransfer;
use Xiphias\BladeFxApi\Exception\TransferPropertyRequiredException;

class ReportByFormatRequestValidator extends AbstractRequestValidator
{
    /**
     * @return string
     */
    protected function getRequestTransferClass(): string
    {
        return BladeFxGetReportByFormatRequestTransfer::class;
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\AbstractTransfer|\Xiphias\BladeFxApi\DTO\BladeFxGetReportByFormatRequestTransfer $requestTransfer
     *
     * @return bool
     */
    protected function validateRequest(AbstractTransfer|BladeFxGetReportByFormatRequestTransfer $requestTransfer): bool
    {
        try {
            /** @var \Xiphias\BladeFxApi\DTO\BladeFxGetReportByFormatRequestTransfer $bladeFxGetReportByFormatRequestTransfer */
            $bladeFxGetReportByFormatRequestTransfer = $requestTransfer;

            $bladeFxGetReportByFormatRequestTransfer
                ->requireAccessToken()
                ->requireRepId()
                ->requireReturnType();
        } catch (TransferPropertyRequiredException $ex) {
            return false;
        }

        return true;
    }
}

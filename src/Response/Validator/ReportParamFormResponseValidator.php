<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Response\Validator;

use Xiphias\BladeFxApi\DTO\AbstractTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportParamFormResponseTransfer;
use Xiphias\BladeFxApi\Exception\TransferPropertyRequiredException;

class ReportParamFormResponseValidator extends AbstractResponseValidator
{
    /**
     * @return string
     */
    public function getResponseTransferClass(): string
    {
        return BladeFxGetReportParamFormResponseTransfer::class;
    }

    /**
     * @param AbstractTransfer $responseTransfer
     * @return bool
     */
    public function validateResponse(AbstractTransfer $responseTransfer): bool
    {
        try {
            /** @var BladeFxGetReportParamFormResponseTransfer $responseTransfer */
            $responseTransfer->requireIframeUrl();
        } catch (TransferPropertyRequiredException $ex) {
            return false;
        }

        return true;
    }
}

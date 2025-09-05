<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Response\Validator;

use Xiphias\BladeFxApi\DTO\AbstractTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportParamFormResponseTransfer;
use Xiphias\BladeFxApi\Exception\TransferPropertyRequiredException;

class ReportParamFormResponseValidator extends AbstractResponseValidator
{
    /**
     * @return string
     */
    public function getResponseTransferClass(): string
    {
        return BladeFxReportParamFormResponseTransfer::class;
    }

    /**
     * @param AbstractTransfer $responseTransfer
     * @return bool
     */
    public function validateResponse(AbstractTransfer $responseTransfer): bool
    {
        try {
            /** @var BladeFxReportParamFormResponseTransfer $responseTransfer */
            $responseTransfer->requireIframeUrl();
        } catch (TransferPropertyRequiredException) {
            return false;
        }

        return true;
    }
}

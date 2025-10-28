<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Response\Validator;

use Xiphias\BladeFxApi\DTO\AbstractTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportPreviewResponseTransfer;
use Xiphias\BladeFxApi\Exception\TransferPropertyRequiredException;

class ReportPreviewResponseValidator extends AbstractResponseValidator
{
    /**
     * @return string
     */
    protected function getResponseTransferClass(): string
    {
        return BladeFxGetReportPreviewResponseTransfer::class;
    }

    /**
     * @param AbstractTransfer $responseTransfer
     * @return bool
     */
    protected function validateResponse(AbstractTransfer $responseTransfer): bool
    {
        try {
            /** @var BladeFxGetReportPreviewResponseTransfer $responseTransfer */
            $responseTransfer->requireUrl();
        } catch (TransferPropertyRequiredException $ex) {
            return false;
        }

        return true;
    }
}

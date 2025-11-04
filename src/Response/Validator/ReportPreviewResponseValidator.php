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
     * @param \Xiphias\BladeFxApi\DTO\AbstractTransfer $responseTransfer
     *
     * @return bool
     */
    protected function validateResponse(AbstractTransfer $responseTransfer): bool
    {
        try {
            /** @var \Xiphias\BladeFxApi\DTO\BladeFxGetReportPreviewResponseTransfer $bladeFxGetReportPreviewResponseTransfer */
            $bladeFxGetReportPreviewResponseTransfer = $responseTransfer;

            $bladeFxGetReportPreviewResponseTransfer->requireUrl();
        } catch (TransferPropertyRequiredException $ex) {
            return false;
        }

        return true;
    }
}

<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Response\Validator;

use Xiphias\BladeFxApi\DTO\AbstractTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportPreviewResponseTransfer;
use Xiphias\BladeFxApi\Exception\TransferPropertyRequiredException;

class ReportPreviewResponseValidator extends AbstractResponseValidator implements ResponseValidatorInterface
{
    /**
     * @return string
     */
    protected function getResponseTransferClass(): string
    {
        return BladeFxReportPreviewResponseTransfer::class;
    }


    protected function validateResponse(AbstractTransfer $responseTransfer): bool
    {
        try {
            /** @var BladeFxReportPreviewResponseTransfer $responseTransfer */
            $responseTransfer->requireUrl();
        } catch (TransferPropertyRequiredException) {
            return false;
        }

        return true;
    }
}

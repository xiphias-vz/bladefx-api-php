<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Request\Validator;

use Xiphias\BladeFxApi\DTO\AbstractTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportPreviewRequestTransfer;
use Xiphias\BladeFxApi\Exception\TransferPropertyRequiredException;

class ReportPreviewRequestValidator extends AbstractRequestValidator implements RequestValidatorInterface
{
    /**
     * @return string
     */
    public function getRequestTransferClass(): string
    {
        return BladeFxGetReportPreviewRequestTransfer::class;
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\AbstractTransfer $requestTransfer
     *
     * @return bool
     */
    public function validateRequest(AbstractTransfer $requestTransfer): bool
    {
        try {
            /** @var \Xiphias\BladeFxApi\DTO\BladeFxGetReportPreviewRequestTransfer $bladeFxGetReportPreviewRequestTransfer */
            $bladeFxGetReportPreviewRequestTransfer = $requestTransfer;

            $bladeFxGetReportPreviewRequestTransfer
                ->requireRootUrl()
                ->requireAccessToken()
                ->requireRepId()
                ->requireParams()
                ->requireReturnType();
        } catch (TransferPropertyRequiredException $ex) {
            return false;
        }

        return true;
    }
}

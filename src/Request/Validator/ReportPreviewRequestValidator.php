<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Request\Validator;

use Xiphias\BladeFxApi\DTO\AbstractTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportPreviewRequestTransfer;
use Xiphias\BladeFxApi\Exception\TransferPropertyRequiredException;

class ReportPreviewRequestValidator extends AbstractRequestValidator implements RequestValidatorInterface
{
    /**
     * @return string
     */
    public function getRequestTransferClass(): string
    {
        return BladeFxReportPreviewRequestTransfer::class;
    }

    /**
     * @param AbstractTransfer $requestTransfer
     * @return bool
     */
    public function validateRequest(AbstractTransfer $requestTransfer): bool
    {
        try {
            /**
             * @var BladeFxReportPreviewRequestTransfer $requestTransfer
             */
            $requestTransfer
                ->requireRootUrl()
                ->requireToken()
                ->requireRepId()
                ->requireParams()
                ->requireReturnType();
        } catch (TransferPropertyRequiredException $ex) {
            return false;
        }

        return true;
    }
}

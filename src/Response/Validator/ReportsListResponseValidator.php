<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Response\Validator;

use Xiphias\BladeFxApi\DTO\AbstractTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportsListResponseTransfer;
use Xiphias\BladeFxApi\Exception\TransferPropertyRequiredException;

class ReportsListResponseValidator extends AbstractResponseValidator
{
    /**
     * @return string
     */
    public function getResponseTransferClass(): string
    {
        return BladeFxGetReportsListResponseTransfer::class;
    }

    /**
     * @param AbstractTransfer $responseTransfer
     * @return bool
     */
    protected function validateResponse(AbstractTransfer $responseTransfer): bool
    {
        try {
            /** @var BladeFxGetReportsListResponseTransfer $responseTransfer */
            $reportsList = $responseTransfer->getReportsList();
            foreach ($reportsList as $report) {
                $report
                    ->requireRepId()
                    ->requireRepName()
                    ->requireRepDesc()
                    ->requireRepHashCode();
            }
        } catch (TransferPropertyRequiredException $ex) {
            return false;
        }

        return true;
    }
}

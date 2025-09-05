<?php


namespace Xiphias\BladeFxApi\Response\Validator;

use Xiphias\BladeFxApi\DTO\AbstractTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportsListResponseTransfer;
use Xiphias\BladeFxApi\Exception\TransferPropertyRequiredException;

class ReportsListResponseValidator extends AbstractResponseValidator
{
    /**
     * @return string
     */
    public function getResponseTransferClass(): string
    {
        return BladeFxReportsListResponseTransfer::class;
    }

    /**
     * @param AbstractTransfer $responseTransfer
     * @return bool
     */
    protected function validateResponse(AbstractTransfer $responseTransfer): bool
    {
        try {
            /** @var BladeFxReportsListResponseTransfer $responseTransfer */
            foreach ($responseTransfer->getReportsList() as $report) {
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

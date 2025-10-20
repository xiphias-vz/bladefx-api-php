<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Response\Converter;

use Xiphias\BladeFxApi\DTO\BladeFxApiResponseConversionResultTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportsListResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportTransfer;

class ReportsListResponseConverter extends AbstractResponseConverter
{
    /**
     * @param BladeFxApiResponseConversionResultTransfer $apiResponseConversionResultTransfer
     * @param array<mixed> $responseData
     * @return BladeFxApiResponseConversionResultTransfer
     */
    public function expandConversionResponseTransfer(
        BladeFxApiResponseConversionResultTransfer $apiResponseConversionResultTransfer,
        array $responseData
    ): BladeFxApiResponseConversionResultTransfer {
        $bladeFxReportsListResponseTransfer = new BladeFxGetReportsListResponseTransfer();
        $bladeFxReportsList = [];
        foreach ($responseData as $report) {
            if (is_array($report)) {
                $bladeFxReport = new BladeFxReportTransfer();
                $bladeFxReport->fromArray($report, true);
                $bladeFxReportsList[] = $bladeFxReport;
            }
        }

        $bladeFxReportsListResponseTransfer->setReportsList($bladeFxReportsList);
        $apiResponseConversionResultTransfer->setBladeFXReportsListResponse($bladeFxReportsListResponseTransfer);

        return $apiResponseConversionResultTransfer;
    }
}

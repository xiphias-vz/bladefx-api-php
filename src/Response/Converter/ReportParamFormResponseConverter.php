<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Response\Converter;

use Xiphias\BladeFxApi\DTO\BladeFxApiResponseConversionResultTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportParamFormResponseTransfer;

class ReportParamFormResponseConverter extends AbstractResponseConverter
{
    protected function expandConversionResponseTransfer(
        BladeFxApiResponseConversionResultTransfer $apiResponseConversionResultTransfer,
        array $responseData
    ): BladeFxApiResponseConversionResultTransfer {
        $bladeFxReportParamFormResponseTransfer = new BladeFxReportParamFormResponseTransfer();
        $bladeFxReportParamFormResponseTransfer->setIframeUrl(
            implode('', $responseData),
        );

        $apiResponseConversionResultTransfer->setBladeFxReportParamFormResponse($bladeFxReportParamFormResponseTransfer);

        return $apiResponseConversionResultTransfer;
    }
}

<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Response\Converter;

use Xiphias\BladeFxApi\DTO\BladeFxApiResponseConversionResultTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportPreviewResponseTransfer;

class ReportPreviewResponseConverter extends AbstractResponseConverter
{
    public function expandConversionResponseTransfer(
        BladeFxApiResponseConversionResultTransfer $apiResponseConversionResultTransfer,
        array $responseData
    ): BladeFxApiResponseConversionResultTransfer {
        $bladeFxReportPreviewResponseTransfer = new BladeFxReportPreviewResponseTransfer();
        $bladeFxReportPreviewResponseTransfer->setUrl(
            implode('', $responseData),
        );

        $apiResponseConversionResultTransfer->setBladeFxReportPreviewResponse($bladeFxReportPreviewResponseTransfer);

        return $apiResponseConversionResultTransfer;
    }
}

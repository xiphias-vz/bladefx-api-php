<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Response\Converter;

use Psr\Http\Message\ResponseInterface;
use Xiphias\BladeFxApi\DTO\BladeFxApiResponseConversionResultTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportPreviewResponseTransfer;

class ReportPreviewResponseConverter extends AbstractResponseConverter
{
    /**
     * @param BladeFxApiResponseConversionResultTransfer $apiResponseConversionResultTransfer
     * @param array $responseData
     * @return BladeFxApiResponseConversionResultTransfer
     */
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

    /**
     * @param ResponseInterface $response
     * @return BladeFxApiResponseConversionResultTransfer
     */
    public function convert(ResponseInterface $response): BladeFxApiResponseConversionResultTransfer
    {
        $bodyContent = $response->getBody()->getContents();

        if (!$bodyContent) {
            $this->logError(
                self::ERROR_INVALID_RESPONSE_MISSING_PROPERTY,
                $response,
            );
        }

        return $this->expandConversionResponseTransfer(
            new BladeFxApiResponseConversionResultTransfer(),
            [$bodyContent],
        );
    }
}

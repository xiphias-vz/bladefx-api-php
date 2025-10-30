<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Response\Converter;

use Psr\Http\Message\ResponseInterface;
use Xiphias\BladeFxApi\DTO\BladeFxApiResponseConversionResultTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportByFormatResponseTransfer;

class ReportByFormatResponseConverter extends AbstractResponseConverter implements ReportByFormatResponseConverterInterface
{
    /**
     * @param BladeFxApiResponseConversionResultTransfer $apiResponseConversionResultTransfer
     * @param array<mixed> $responseData
     * @return BladeFxApiResponseConversionResultTransfer
     */
    protected function expandConversionResponseTransfer(
        BladeFxApiResponseConversionResultTransfer $apiResponseConversionResultTransfer,
        array $responseData
    ): BladeFxApiResponseConversionResultTransfer {
        $bladeFxGetReportByFormatResponseTransfer = new BladeFxGetReportByFormatResponseTransfer();
        $bladeFxGetReportByFormatResponseTransfer->setReport(
            implode('', $responseData),
        );

        return $apiResponseConversionResultTransfer->setBladeFxGetReportByFormatResponse($bladeFxGetReportByFormatResponseTransfer);
    }

    /**
     * @param ResponseInterface $response
     * @return BladeFxApiResponseConversionResultTransfer
     */
    public function decodeFromBase64(ResponseInterface $response): BladeFxApiResponseConversionResultTransfer
    {
        $bodyContent = $response->getBody()->getContents();
        if (!$bodyContent) {
            $this->logError(
                self::ERROR_INVALID_RESPONSE_MISSING_PROPERTY,
                $response,
            );
        }

        $bladeFxApiResponseConversionResultTransfer = $this->createConversionResultTransfer();

        return $this->expandConversionResponseTransfer(
            $bladeFxApiResponseConversionResultTransfer,
            [base64_decode($bodyContent)],
        );
    }
}

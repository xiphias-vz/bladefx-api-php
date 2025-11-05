<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Response\Converter;

use Psr\Http\Message\ResponseInterface;
use Xiphias\BladeFxApi\DTO\BladeFxApiResponseConversionResultTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportPreviewResponseTransfer;

class ReportPreviewResponseConverter extends AbstractResponseConverter
{
    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxApiResponseConversionResultTransfer $apiResponseConversionResultTransfer
     * @param array<mixed> $responseData
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxApiResponseConversionResultTransfer
     */
    public function expandConversionResponseTransfer(
        BladeFxApiResponseConversionResultTransfer $apiResponseConversionResultTransfer,
        array $responseData
    ): BladeFxApiResponseConversionResultTransfer {
        $bladeFxGetReportPreviewResponseTransfer = new BladeFxGetReportPreviewResponseTransfer();
        $bladeFxGetReportPreviewResponseTransfer->setUrl(
            implode('', $responseData),
        );

        $apiResponseConversionResultTransfer->setBladeFxReportPreviewResponse($bladeFxGetReportPreviewResponseTransfer);

        return $apiResponseConversionResultTransfer;
    }

    /**
     * @param \Psr\Http\Message\ResponseInterface $response
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxApiResponseConversionResultTransfer
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

<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Response\Converter;

use Psr\Http\Message\ResponseInterface;
use Xiphias\BladeFxApi\DTO\BladeFxApiResponseConversionResultTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportParamFormResponseTransfer;

class ReportParamFormResponseConverter extends AbstractResponseConverter
{
    /**
     * @param BladeFxApiResponseConversionResultTransfer $apiResponseConversionResultTransfer
     * @param array $responseData
     * @return BladeFxApiResponseConversionResultTransfer
     */
    protected function expandConversionResponseTransfer(
        BladeFxApiResponseConversionResultTransfer $apiResponseConversionResultTransfer,
        array $responseData
    ): BladeFxApiResponseConversionResultTransfer {
        return $apiResponseConversionResultTransfer;
    }

    /**
     * @param ResponseInterface $response
     * @return BladeFxApiResponseConversionResultTransfer
     */
    public function convert(ResponseInterface $response): BladeFxApiResponseConversionResultTransfer
    {
        $paramFormIframeUrl = $response->getBody()->getContents();

        if (!$paramFormIframeUrl) {
            $this->logError(
                self::ERROR_INVALID_RESPONSE_MISSING_PROPERTY,
                $response,
            );
        }

        $bladeFxApiResponseConversionResultTransfer = $this->createConversionResultTransfer();

        return $bladeFxApiResponseConversionResultTransfer
            ->setBladeFxReportParamFormResponse(
                (new BladeFxReportParamFormResponseTransfer())
                    ->setIframeUrl($paramFormIframeUrl),
            );
    }
}

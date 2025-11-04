<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Response\Converter;

use Psr\Http\Message\ResponseInterface;
use Xiphias\BladeFxApi\DTO\BladeFxApiResponseConversionResultTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportParamFormResponseTransfer;

class ReportParamFormResponseConverter extends AbstractResponseConverter
{
    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxApiResponseConversionResultTransfer $apiResponseConversionResultTransfer
     * @param array<mixed> $responseData
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxApiResponseConversionResultTransfer
     */
    protected function expandConversionResponseTransfer(
        BladeFxApiResponseConversionResultTransfer $apiResponseConversionResultTransfer,
        array $responseData
    ): BladeFxApiResponseConversionResultTransfer {
        return $apiResponseConversionResultTransfer;
    }

    /**
     * @param \Psr\Http\Message\ResponseInterface $response
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxApiResponseConversionResultTransfer
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
                (new BladeFxGetReportParamFormResponseTransfer())
                    ->setIframeUrl($paramFormIframeUrl),
            );
    }
}

<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Response\Converter;

use Psr\Http\Message\ResponseInterface;
use Xiphias\BladeFxApi\DTO\BladeFxApiResponseConversionResultTransfer;

interface ReportByFormatResponseConverterInterface extends ResponseConverterInterface
{
    /**
     * @param ResponseInterface $response
     * @return BladeFxApiResponseConversionResultTransfer
     */
    public function decodeFromBase64(ResponseInterface $response): BladeFxApiResponseConversionResultTransfer;
}

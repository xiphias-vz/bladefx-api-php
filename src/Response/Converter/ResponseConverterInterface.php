<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Response\Converter;

use Symfony\Contracts\HttpClient\ResponseInterface;
use Xiphias\BladeFxApi\DTO\BladeFxApiResponseConversionResultTransfer;

interface ResponseConverterInterface
{
    /**
     * @param ResponseInterface $response
     * @return BladeFxApiResponseConversionResultTransfer
     */
    public function convert(ResponseInterface $response): BladeFxApiResponseConversionResultTransfer;
}

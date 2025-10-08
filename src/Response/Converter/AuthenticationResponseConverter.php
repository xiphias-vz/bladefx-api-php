<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Response\Converter;

use Xiphias\BladeFxApi\DTO\BladeFxApiResponseConversionResultTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxAuthenticationResponseTransfer;

class AuthenticationResponseConverter extends AbstractResponseConverter
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
        $bladeFxAuthenticationResponseTransfer = new BladeFxAuthenticationResponseTransfer();
        $bladeFxAuthenticationResponseTransfer->fromArray($responseData, true);

        $apiResponseConversionResultTransfer->setBladeFxAuthenticationResponse($bladeFxAuthenticationResponseTransfer);

        return $apiResponseConversionResultTransfer;
    }
}

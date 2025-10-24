<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Response\Converter;

use Xiphias\BladeFxApi\DTO\BladeFxApiResponseConversionResultTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxUpdatePasswordResponseTransfer;

class UpdatePasswordOnBladeFxResponseConverter extends AbstractResponseConverter
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
        $bladeFxUpdatePassword = new BladeFxUpdatePasswordResponseTransfer();
        $bladeFxUpdatePassword->fromArray($responseData);

        return $apiResponseConversionResultTransfer->setBladeFxUpdatePasswordResponse($bladeFxUpdatePassword);
    }
}

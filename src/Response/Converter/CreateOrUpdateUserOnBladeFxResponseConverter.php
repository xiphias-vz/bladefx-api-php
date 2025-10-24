<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Response\Converter;

use Xiphias\BladeFxApi\DTO\BladeFxApiResponseConversionResultTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxCreateOrUpdateUserResponseTransfer;

class CreateOrUpdateUserOnBladeFxResponseConverter extends AbstractResponseConverter
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
        $bladeFxCreateOrUpdateUserOnBfx = new BladeFxCreateOrUpdateUserResponseTransfer();

        $bladeFxCreateOrUpdateUserOnBfx->fromArray($responseData);

        return $apiResponseConversionResultTransfer->setBladeFxCreateOrUpdateUserResponse($bladeFxCreateOrUpdateUserOnBfx);
    }
}

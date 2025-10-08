<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Response\Validator;

use Xiphias\BladeFxApi\DTO\AbstractTransfer;

interface ResponseValidatorInterface
{
    /**
     * @param AbstractTransfer $responseTransfer
     * @return bool
     */
    public function isResponseValid(AbstractTransfer $responseTransfer): bool;
}

<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Request\Validator;

use Xiphias\BladeFxApi\DTO\AbstractTransfer;

interface RequestValidatorInterface
{
    /**
     * @param \Xiphias\BladeFxApi\DTO\AbstractTransfer $requestTransfer
     *
     * @return bool
     */
    public function isRequestValid(AbstractTransfer $requestTransfer): bool;
}

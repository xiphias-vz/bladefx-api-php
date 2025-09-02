<?php


namespace Xiphias\BladeFxApi\Response\Validator;

use Xiphias\BladeFxApi\DTO\AbstractTransfer;

interface ResponseValidatorInterface
{
    /**
     * @param \Xiphias\BladeFxApi\DTO\AbstractTransfer $responseTransfer
     *
     * @return bool
     */
    public function isResponseValid(AbstractTransfer $responseTransfer): bool;
}

<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Request\Builder;

use Psr\Http\Message\RequestInterface;
use Xiphias\BladeFxApi\DTO\AbstractTransfer;

interface RequestBuilderInterface
{
    /**
     * @param string $resource
     * @param AbstractTransfer $requestTransfer
     * @return RequestInterface
     */
    public function buildRequest(
        string $resource,
        AbstractTransfer $requestTransfer
    ): RequestInterface;
}

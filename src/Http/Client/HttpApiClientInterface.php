<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Http\Client;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

interface HttpApiClientInterface
{
    /**
     * @param RequestInterface $request
     * @param array<mixed> $options
     * @return ResponseInterface
     */
    public function sendRequest(RequestInterface $request, array $options = []): ResponseInterface;
}

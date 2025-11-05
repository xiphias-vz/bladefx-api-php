<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Http\Client;

use GuzzleHttp\ClientInterface;
use Psr\Log\LoggerInterface;

abstract class AbstractHttpClient implements HttpApiClientInterface
{
    /**
     * @var \GuzzleHttp\ClientInterface
     */
    protected ClientInterface $client;

    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected LoggerInterface $logger;

    /**
     * @param \GuzzleHttp\ClientInterface $client
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(
        ClientInterface $client,
        LoggerInterface $logger
    ) {
        $this->client = $client;
        $this->logger = $logger;
    }
}

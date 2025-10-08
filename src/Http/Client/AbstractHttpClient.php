<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Http\Client;

use GuzzleHttp\ClientInterface;
use Psr\Log\LoggerInterface;

abstract class AbstractHttpClient implements HttpApiClientInterface
{
    /**
     * @var ClientInterface
     */
    protected ClientInterface $client;

    /**
     * @var LoggerInterface
     */
    protected LoggerInterface $logger;

    /**
     * @param ClientInterface $client
     * @param LoggerInterface $logger
     */
    public function __construct(
        ClientInterface $client,
        LoggerInterface $logger
    )
    {
        $this->client = $client;
        $this->logger = $logger;
    }
}

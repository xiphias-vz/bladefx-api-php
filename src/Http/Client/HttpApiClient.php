<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Http\Client;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Throwable;
use Xiphias\BladeFxApi\BladeFxApiConfig;

class HttpApiClient extends AbstractHttpClient
{
    /**
     * @var string
     */
    private const ERROR_API_REQUEST_FAILED = '%s BladeFx API request failed! %s';

    /**
     * @param \Psr\Http\Message\RequestInterface $request
     * @param array<mixed> $options
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function sendRequest(RequestInterface $request, array $options = []): ResponseInterface
    {
        try {
            return $this->client->send($request, $options);
        } catch (Throwable $exception) {
            $this->logException($exception, $request);
        }

        return new Response();
    }

    /**
     * @param \Throwable $exception
     * @param \Psr\Http\Message\RequestInterface $request
     *
     * @return void
     */
    private function logException(Throwable $exception, RequestInterface $request): void
    {
        $this->logger->critical(
            $this->formatMessage($exception->getMessage()),
            $this->getErrorContext($exception, $request),
        );
    }

    /**
     * @param string $exceptionMessage
     *
     * @return string
     */
    private function formatMessage(string $exceptionMessage): string
    {
        return sprintf(
            self::ERROR_API_REQUEST_FAILED,
            BladeFXApiConfig::LOG_MESSAGE_PREFIX,
            $exceptionMessage,
        );
    }

    /**
     * @param \Throwable $exception
     * @param \Psr\Http\Message\RequestInterface $request
     *
     * @return array<mixed>
     */
    private function getErrorContext(Throwable $exception, RequestInterface $request): array
    {
        return [
            'exception' => $exception,
            'request_uri' => $request->getUri(),
        ];
    }
}

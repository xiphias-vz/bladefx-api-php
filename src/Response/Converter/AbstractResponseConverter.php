<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Response\Converter;

use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use Xiphias\BladeFxApi\DTO\BladeFxApiResponseConversionResultTransfer;

abstract class AbstractResponseConverter implements ResponseConverterInterface
{
    public const DEFAULT_OPTIONS = JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT | JSON_PARTIAL_OUTPUT_ON_ERROR;

    /**
     * @var int
     */
    public const DEFAULT_DEPTH = 512;

    /**
     * @var string
     */
    protected const ERROR_INVALID_RESPONSE_MISSING_PROPERTY = '%s Invalid Response: Missing response property values.';

    /**
     * @var string
     */
    protected const LOG_MESSAGE_PREFIX = 'BladeFxAPIClient: ';

    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param \Psr\Http\Message\ResponseInterface $response
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxApiResponseConversionResultTransfer
     */
    public function convert(ResponseInterface $response): BladeFxApiResponseConversionResultTransfer
    {
        $responseData = $this->decodeResponse($response, true);
        $responseData = is_array($responseData) ? $responseData : [$responseData];
        $bladeFxApiResponseConversionResultTransfer = $this->createConversionResultTransfer();

        return $this->expandConversionResponseTransfer(
            $bladeFxApiResponseConversionResultTransfer,
            $responseData,
        );
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxApiResponseConversionResultTransfer $apiResponseConversionResultTransfer
     * @param array<mixed> $responseData
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxApiResponseConversionResultTransfer
     */
    abstract protected function expandConversionResponseTransfer(
        BladeFxApiResponseConversionResultTransfer $apiResponseConversionResultTransfer,
        array $responseData
    ): BladeFxApiResponseConversionResultTransfer;

    /**
     * @param \Psr\Http\Message\ResponseInterface $response
     * @param bool $assoc
     * @param int|null $depth
     * @param int|null $options
     *
     * @return array<mixed>|string|null
     */
    private function decodeResponse(ResponseInterface $response, bool $assoc = false, ?int $depth = null, ?int $options = null): array|string|null
    {
        $bodyContent = $response->getBody()->getContents();
        if (!$bodyContent) {
            $this->logError(
                self::ERROR_INVALID_RESPONSE_MISSING_PROPERTY,
                $response,
            );

            return [];
        }

        if ($options === null) {
            $options = static::DEFAULT_OPTIONS;
        }

        if ($depth === null || $depth === 0) {
            $depth = static::DEFAULT_DEPTH;
        }

        return json_decode((string)$bodyContent, $assoc, $depth, $options);
    }

    /**
     * @param string $errorMessage
     * @param \Psr\Http\Message\ResponseInterface $response
     *
     * @return void
     */
    protected function logError(string $errorMessage, ResponseInterface $response): void
    {
        $this->logger->critical(
            $this->formatMessage($errorMessage),
            $this->createArrayWithResponseData($response),
        );
    }

    /**
     * @param string $message
     *
     * @return string
     */
    private function formatMessage(string $message): string
    {
        return sprintf(
            $message,
            self::LOG_MESSAGE_PREFIX,
        );
    }

    /**
     * @param \Psr\Http\Message\ResponseInterface $response
     *
     * @return array<\Psr\Http\Message\ResponseInterface>
     */
    private function createArrayWithResponseData(ResponseInterface $response): array
    {
        return [
            'response' => $response,
        ];
    }

    /**
     * @return \Xiphias\BladeFxApi\DTO\BladeFxApiResponseConversionResultTransfer
     */
    protected function createConversionResultTransfer(): BladeFxApiResponseConversionResultTransfer
    {
        return new BladeFxApiResponseConversionResultTransfer();
    }
}

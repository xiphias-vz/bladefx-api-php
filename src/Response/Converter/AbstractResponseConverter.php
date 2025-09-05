<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Response\Converter;

use Symfony\Contracts\HttpClient\ResponseInterface;
use Psr\Log\LoggerInterface;
use Xiphias\BladeFxApi\DTO\BladeFxApiResponseConversionResultTransfer;

abstract class AbstractResponseConverter implements ResponseConverterInterface
{
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
     * @param ResponseInterface $response
     * @return BladeFxApiResponseConversionResultTransfer
     */
    public function convert(ResponseInterface $response): BladeFxApiResponseConversionResultTransfer
    {
        $responseData = $this->decodeResponse($response);
        $responseData = is_array($responseData) ? $responseData : [$responseData];
        $bladeFxApiResponseConversionResultTransfer = $this->createConversionResultTransfer();

        return $this->expandConversionResponseTransfer(
            $bladeFxApiResponseConversionResultTransfer,
            $responseData,
        );
    }

    /**
     * @param BladeFxApiResponseConversionResultTransfer $apiResponseConversionResultTransfer
     * @param array $responseData
     * @return BladeFxApiResponseConversionResultTransfer
     */
    abstract protected function expandConversionResponseTransfer(
        BladeFxApiResponseConversionResultTransfer $apiResponseConversionResultTransfer,
        array $responseData
    ): BladeFxApiResponseConversionResultTransfer;

    /**
     * @param \Psr\Http\Message\ResponseInterface $response
     *
     * @return array|string|null
     */
    private function decodeResponse(ResponseInterface $response): array|string|null
    {
        $bodyContent = $response->getContent(false);
        if (!$bodyContent) {
            $this->logError(
                self::ERROR_INVALID_RESPONSE_MISSING_PROPERTY,
                $response,
            );

            return [];
        }

        $contentType = $response->getHeaders(false)['content-type'][0] ?? '';

        if (str_contains($contentType, 'application/json')) {
            return $response->toArray(false);
        }

        return $response->getContent(false);


//        return $this->utilEncodingService->decodeJson($bodyContent, true);
    }

//    /**
//     * @param \Psr\Http\Message\ResponseInterface $response
//     *
//     * @return array|string|null
//     */
//    private function decodeResponse(ResponseInterface $response): array|string|null
//    {
//        $bodyContent = $response->getBody()->getContents();
//        if (!$bodyContent) {
//            $this->logError(
//                self::ERROR_INVALID_RESPONSE_MISSING_PROPERTY,
//                $response,
//            );
//
//            return [];
//        }
//
//        return $this->utilEncodingService->decodeJson($bodyContent, true);
//    }

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
     * @return BladeFxApiResponseConversionResultTransfer
     */
    protected function createConversionResultTransfer(): BladeFxApiResponseConversionResultTransfer
    {
        return new BladeFxApiResponseConversionResultTransfer();
    }
}

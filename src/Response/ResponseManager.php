<?php


declare(strict_types=1);

namespace Xiphias\BladeFxApi\Response;

use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Xiphias\BladeFxApi\DTO\AbstractTransfer;
use Xiphias\BladeFxApi\DTO\BladeFXCategoriesListResponseTransfer;
use Xiphias\BladeFxApi\Response\Exception\ReportsResponseException;
use Xiphias\BladeFxApi\Response\Validator\ResponseValidatorInterface;

//class ResponseManager implements ResponseManagerInterface
class ResponseManager
{
    /**
     * @var string
     */
    private const ERROR_INVALID_RESPONSE_GENERIC = '%s Invalid Response.';

    /**
     * @var string
     */
    private const LOG_MESSAGE_PREFIX = 'BladeFxAPIClient: ';

//    private LoggerInterface $logger;
//
//    public function __construct(LoggerInterface $logger)
//    {
//        $this->logger = $logger;
//    }
//
//    /**
//     * @param \Psr\Http\Message\ResponseInterface|null $response
//     *
//     * @return \Xiphias\BladeFxApi\DTO\BladeFxCategoriesListResponseTransfer
//     */
//    public function getCategoriesListResponseTransfer(?ResponseInterface $response): BladeFxCategoriesListResponseTransfer
//    {
//        $this->validateRawResponse($response);
//        $converterResultTransfer = $this->responseFactory->createCategoriesListResponseConverter()->convert($response);
//        $validator = $this->responseFactory->createCategoriesListResponseValidator();
//
//        try {
//            $this->validateResponse($validator, $converterResultTransfer->getBladeFxCategoriesListResponse());
//        } catch (ReportsResponseException $e) {
//        }
//
//        return $converterResultTransfer->getBladeFxCategoriesListResponse();
//    }
//
//    /**
//     * @param \Psr\Http\Message\ResponseInterface|null $response
//     *
//     * @return void
//     */
//    protected function validateRawResponse(?ResponseInterface $response): void
//    {
//        if ($response === null || $response->getStatusCode() !== Response::HTTP_OK) {
//            $this->logRawDataError(
//                self::ERROR_INVALID_RESPONSE_GENERIC,
//                $response,
//            );
//        }
//    }
//
//    /**
//     * @param \Xiphias\BladeFxApi\Response\Validator\ResponseValidatorInterface $validator
//     * @param \Xiphias\BladeFxApi\DTO\AbstractTransfer $response
//     *
//     * @throws \Xiphias\BladeFxApi\Response\Exception\ReportsResponseException
//     *
//     * @return void
//     */
//    private function validateResponse(ResponseValidatorInterface $validator, AbstractTransfer $response): void
//    {
//        if (!$validator->isResponseValid($response)) {
//            $this->logError('', $response);
//
//            throw new ReportsResponseException();
//        }
//    }
//
//    /**
//     * @param string $errorMessage
//     * @param \Xiphias\BladeFxApi\DTO\AbstractTransfer $response
//     *
//     * @return void
//     */
//    protected function logError(string $errorMessage, AbstractTransfer $response): void
//    {
//        $this->logger->critical(
//            $this->formatMessage($errorMessage),
//            $this->createArrayWithResponseData($response),
//        );
//    }
//
//    /**
//     * @param string $errorMessage
//     * @param \Psr\Http\Message\ResponseInterface $rawResponse
//     *
//     * @return void
//     */
//    protected function logRawDataError(string $errorMessage, ResponseInterface $rawResponse): void
//    {
//        $this->logger->critical(
//            $this->formatMessage($errorMessage),
//            $this->createArrayWithRawResponseData($rawResponse),
//        );
//    }
//
//    /**
//     * @param string $message
//     *
//     * @return string
//     */
//    private function formatMessage(string $message): string
//    {
//        return sprintf(
//            $message,
//            self::LOG_MESSAGE_PREFIX,
//        );
//    }
//
//    /**
//     * @param \Xiphias\BladeFxApi\DTO\AbstractTransfer $response
//     *
//     * @return array<\Xiphias\BladeFxApi\DTO\AbstractTransfer>
//     */
//    private function createArrayWithResponseData(AbstractTransfer $response): array
//    {
//        return [
//            'response' => $response,
//        ];
//    }
//
//    /**
//     * @param \Psr\Http\Message\ResponseInterface $rawResponse
//     *
//     * @return array<\Psr\Http\Message\ResponseInterface>
//     */
//    private function createArrayWithRawResponseData(ResponseInterface $rawResponse): array
//    {
//        return [
//            'rawResponse' => $rawResponse,
//        ];
//    }
}

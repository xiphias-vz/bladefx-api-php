<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Response;

use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Xiphias\BladeFxApi\BladeFxApiConfig;
use Xiphias\BladeFxApi\DTO\AbstractTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxAuthenticationResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxCategoriesListResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxCreateOrUpdateUserResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportByFormatResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportParamFormResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportPreviewResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportsListResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxSetFavoriteReportResponseTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxUpdatePasswordResponseTransfer;
use Xiphias\BladeFxApi\Response\Exception\ReportsResponseException;
use Xiphias\BladeFxApi\Response\Validator\ResponseValidatorInterface;

class ResponseManager implements ResponseManagerInterface
{
    /**
     * @var string
     */
    private const ERROR_INVALID_RESPONSE_GENERIC = '%s Invalid Response.';

    /**
     * @var string
     */
    private const LOG_MESSAGE_PREFIX = 'BladeFxAPIClient: ';

    /**
     * @var \Psr\Log\LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * @var \Xiphias\BladeFxApi\Response\ResponseFactoryInterface
     */
    private ResponseFactoryInterface $responseFactory;

    /**
     * @param \Psr\Log\LoggerInterface $logger
     * @param \Xiphias\BladeFxApi\Response\ResponseFactoryInterface $responseFactory
     */
    public function __construct(
        LoggerInterface $logger,
        ResponseFactoryInterface $responseFactory
    ) {
        $this->logger = $logger;
        $this->responseFactory = $responseFactory;
    }

    /**
     * @param \Psr\Http\Message\ResponseInterface|null $response
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxAuthenticationResponseTransfer
     */
    public function getAuthenticationUserResponseTransfer(?ResponseInterface $response): BladeFxAuthenticationResponseTransfer
    {
        $this->validateRawResponse($response);
        $converterResultTransfer = $this->responseFactory->createAuthenticationResponseConverter()->convert($response);
        $validator = $this->responseFactory->createAuthenticationResponseValidator();

        try {
            $this->validateResponse($validator, $converterResultTransfer->getBladeFxAuthenticationResponse());
        } catch (ReportsResponseException $e) {
        }

        return $converterResultTransfer->getBladeFxAuthenticationResponse();
    }

    /**
     * @param \Psr\Http\Message\ResponseInterface|null $response
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxCategoriesListResponseTransfer
     */
    public function getCategoriesListResponseTransfer(?ResponseInterface $response): BladeFxCategoriesListResponseTransfer
    {
        $this->validateRawResponse($response);
        $converterResultTransfer = $this->responseFactory->createCategoriesListResponseConverter()->convert($response);
        $validator = $this->responseFactory->createCategoriesListResponseValidator();

        try {
            $this->validateResponse($validator, $converterResultTransfer->getBladeFxCategoriesListResponse());
        } catch (ReportsResponseException $e) {
        }

        return $converterResultTransfer->getBladeFxCategoriesListResponse();
    }

    /**
     * @param \Psr\Http\Message\ResponseInterface|null $response
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxGetReportsListResponseTransfer
     */
    public function getReportsListResponseTransfer(?ResponseInterface $response): BladeFxGetReportsListResponseTransfer
    {
        $this->validateRawResponse($response);
        $converterResultTransfer = $this->responseFactory->createReportsListResponseConverter()->convert($response);
        $validator = $this->responseFactory->createReportsListResponseValidator();
        $this->validateResponse($validator, $converterResultTransfer->getBladeFxReportsListResponse());

        return $converterResultTransfer->getBladeFXReportsListResponse();
    }

    /**
     * @param \Psr\Http\Message\ResponseInterface|null $response
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxGetReportParamFormResponseTransfer
     */
    public function getReportParamFormResponseTransfer(?ResponseInterface $response): BladeFxGetReportParamFormResponseTransfer
    {
        $this->validateRawResponse($response);
        $converterResultTransfer = $this->responseFactory->createReportParamFormRequestConverter()->convert($response);
        $validator = $this->responseFactory->createReportParamFormResponseValidator();
        $this->validateResponse($validator, $converterResultTransfer->getBladeFxReportParamFormResponse());

        return $converterResultTransfer->getBladeFxReportParamFormResponse();
    }

    /**
     * @param \Psr\Http\Message\ResponseInterface|null $response
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxGetReportPreviewResponseTransfer
     */
    public function getReportPreviewResponseTransfer(?ResponseInterface $response): BladeFxGetReportPreviewResponseTransfer
    {
        $this->validateRawResponse($response);
        $converterResultTransfer = $this->responseFactory->createReportPreviewResponseConverter()->convert($response);
        $validator = $this->responseFactory->createResponsePreviewValidator();
        $this->validateResponse($validator, $converterResultTransfer->getBladeFxReportPreviewResponse());

        return $converterResultTransfer->getBladeFxReportPreviewResponse();
    }

    /**
     * @param \Psr\Http\Message\ResponseInterface|null $response
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxSetFavoriteReportResponseTransfer
     */
    public function getSetFavoriteReportResponseTransfer(?ResponseInterface $response): BladeFxSetFavoriteReportResponseTransfer
    {
        $this->validateRawResponse($response);
        $converterResultTransfer = $this->responseFactory->createSetFavoriteReportResponseConverter()->convert($response);
        $validator = $this->responseFactory->createSetFavoriteReportResponseValidator();

        try {
            $this->validateResponse($validator, $converterResultTransfer->getBladeFxSetFavoriteReportResponse());
        } catch (ReportsResponseException $e) {
            $converterResultTransfer->getBladeFxSetFavoriteReportResponse()->setSuccess(false);
        }

        return $converterResultTransfer->getBladeFxSetFavoriteReportResponse();
    }

    /**
     * @param \Psr\Http\Message\ResponseInterface|null $response
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxCreateOrUpdateUserResponseTransfer
     */
    public function getCreateOrUpdateUserOnBladeFxResponseTransfer(?ResponseInterface $response): BladeFxCreateOrUpdateUserResponseTransfer
    {
        $this->validateRawResponse($response);
        $converterResultTransfer = $this->responseFactory->createCreateOrUpdateUserOnBfxResponseConverter()->convert($response);
        $validator = $this->responseFactory->createCreateOrUpdateUserOnBfxResponseValidator();

        try {
            $this->validateResponse($validator, $converterResultTransfer->getBladeFxCreateOrUpdateUserResponse());
        } catch (ReportsResponseException $e) {
            $bladeFxCreateOrUpdateUserResponseTransfer = $converterResultTransfer->getBladeFxCreateOrUpdateUserResponse();
            $bladeFxCreateOrUpdateUserResponseTransfer
                ->setSuccess(false)
                ->setErrorMessage(BladeFxApiConfig::USER_CREATE_UPDATE_DELETE_FAILED_GENERAL_ERROR);
        }

        return $converterResultTransfer->getBladeFxCreateOrUpdateUserResponse();
    }

    /**
     * @param \Psr\Http\Message\ResponseInterface|null $response
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxUpdatePasswordResponseTransfer
     */
    public function getUpdatePasswordOnBladeFxRequest(?ResponseInterface $response): BladeFxUpdatePasswordResponseTransfer
    {
        $this->validateRawResponse($response);
        $converterResultTransfer = $this->responseFactory->createUpdatePasswordOnBladeFxResponseConverter()->convert($response);
        $validator = $this->responseFactory->createUpdatePasswordOnBladeFxResponseValidator();

        $this->validateResponse($validator, $converterResultTransfer->getBladeFxUpdatePasswordResponse());

        return $converterResultTransfer->getBladeFxUpdatePasswordResponse();
    }

    /**
     * @param \Psr\Http\Message\ResponseInterface|null $response
     * @param string $format
     *
     * @return \Xiphias\BladeFxApi\DTO\BladeFxGetReportByFormatResponseTransfer
     */
    public function getReportByFormatResponseTransfer(?ResponseInterface $response, string $format): BladeFxGetReportByFormatResponseTransfer
    {
        $this->validateRawResponse($response);
        $converterResultTransfer = $this->responseFactory->createReportByFormatResponseConverter()->decodeFromBase64($response);
        $validator = $this->responseFactory->createReportByFormatResponseValidator();
        $this->validateResponse($validator, $converterResultTransfer->getBladeFxGetReportByFormatResponse());

        return $converterResultTransfer->getBladeFxGetReportByFormatResponse();
    }

    /**
     * @param \Psr\Http\Message\ResponseInterface|null $response
     *
     * @return void
     */
    protected function validateRawResponse(?ResponseInterface $response): void
    {
        if ($response === null || $response->getStatusCode() !== Response::HTTP_OK) {
            $this->logRawDataError(
                self::ERROR_INVALID_RESPONSE_GENERIC,
                $response,
            );
        }
    }

    /**
     * @param \Xiphias\BladeFxApi\Response\Validator\ResponseValidatorInterface $validator
     * @param \Xiphias\BladeFxApi\DTO\AbstractTransfer $response
     *
     * @throws \Xiphias\BladeFxApi\Response\Exception\ReportsResponseException
     *
     * @return void
     */
    private function validateResponse(ResponseValidatorInterface $validator, AbstractTransfer $response): void
    {
        if (!$validator->isResponseValid($response)) {
            $this->logError('', $response);

            throw new ReportsResponseException();
        }
    }

    /**
     * @param string $errorMessage
     * @param \Xiphias\BladeFxApi\DTO\AbstractTransfer $response
     *
     * @return void
     */
    protected function logError(string $errorMessage, AbstractTransfer $response): void
    {
        $this->logger->critical(
            $this->formatMessage($errorMessage),
            $this->createArrayWithResponseData($response),
        );
    }

    /**
     * @param string $errorMessage
     * @param \Psr\Http\Message\ResponseInterface $rawResponse
     *
     * @return void
     */
    protected function logRawDataError(string $errorMessage, ResponseInterface $rawResponse): void
    {
        $this->logger->critical(
            $this->formatMessage($errorMessage),
            $this->createArrayWithRawResponseData($rawResponse),
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
     * @param \Xiphias\BladeFxApi\DTO\AbstractTransfer $response
     *
     * @return array<\Xiphias\BladeFxApi\DTO\AbstractTransfer>
     */
    private function createArrayWithResponseData(AbstractTransfer $response): array
    {
        return [
            'response' => $response,
        ];
    }

    /**
     * @param \Psr\Http\Message\ResponseInterface $rawResponse
     *
     * @return array<\Psr\Http\Message\ResponseInterface>
     */
    private function createArrayWithRawResponseData(ResponseInterface $rawResponse): array
    {
        return [
            'rawResponse' => $rawResponse,
        ];
    }
}

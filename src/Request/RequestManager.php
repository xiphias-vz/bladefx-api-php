<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Request;

use Psr\Http\Message\RequestInterface;
use Psr\Log\LoggerInterface;
use Xiphias\BladeFxApi\BladeFxApiConfig;
use Xiphias\BladeFxApi\DTO\AbstractTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxCategoriesListRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportParamFormRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportPreviewRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportsListRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxSetFavoriteReportRequestTransfer;
use Xiphias\BladeFxApi\Exception\ReportsRequestException;
use Xiphias\BladeFxApi\Request\Builder\RequestBuilderInterface;
use Xiphias\BladeFxApi\Request\Validator\RequestValidatorInterface;
use Xiphias\BladeFxApi\DTO\BladeFxAuthenticationRequestTransfer;

class RequestManager implements RequestManagerInterface
{
    /**
     * @var string
     */
    private const ERROR_INVALID_REQUEST_PARAMETERS = '%s Blade Fx request has invalid data.';

    /**
     * @var string
     */
    protected const LOGGER_TYPE_TRANSFER = 'transfer';

    /**
     * @var RequestBuilderInterface
     */
    private RequestBuilderInterface $requestBuilder;

    /**
     * @var RequestFactoryInterface
     */
    private RequestFactoryInterface $requestFactory;

    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * @param RequestFactoryInterface $requestFactory
     * @param LoggerInterface $logger
     */
    public function __construct(
        RequestFactoryInterface $requestFactory,
        LoggerInterface $logger
    ) {
        $this->requestFactory = $requestFactory;
        $this->logger = $logger;
    }

    /**
     * @param string $resource
     * @param BladeFxAuthenticationRequestTransfer $requestTransfer
     * @return RequestInterface
     */
    public function getAuthenticateUserRequest(
        string $resource,
        BladeFxAuthenticationRequestTransfer $requestTransfer
    ): RequestInterface {
        $validator = $this->requestFactory->createAuthenticationRequestValidator();
        $this->validateRequest($validator, $requestTransfer);

        return $this->requestBuilder->buildRequest($resource, $requestTransfer);
    }

    /**
     * @param string $resource
     * @param BladeFxCategoriesListRequestTransfer $requestTransfer
     * @return RequestInterface
     */
    public function getCategoriesListRequest(
        string $resource,
        BladeFxCategoriesListRequestTransfer $requestTransfer
    ): RequestInterface {
        $validator = $this->requestFactory->createCategoriesListRequestValidator();
        $this->validateRequest($validator, $requestTransfer);

        return $this->requestBuilder->buildRequest($resource, $requestTransfer);
    }

    /**
     * @param string $resource
     * @param BladeFxReportsListRequestTransfer $requestTransfer
     * @return RequestInterface
     */
    public function getReportsListRequest(
        string $resource,
        BladeFxReportsListRequestTransfer $requestTransfer
    ): RequestInterface {
        $validator = $this->requestFactory->createReportsListRequestValidator();
        $this->validateRequest($validator, $requestTransfer);

        return $this->requestBuilder->buildRequest($resource, $requestTransfer);
    }

    /**
     * @param string $resource
     * @param BladeFxReportParamFormRequestTransfer $requestTransfer
     * @return RequestInterface
     */
    public function getReportParamFormRequest(
        string $resource,
        BladeFxReportParamFormRequestTransfer $requestTransfer
    ): RequestInterface {
        $validator = $this->requestFactory->createReportParamFormRequestValidator();
        $this->validateRequest($validator, $requestTransfer);

        return $this->requestBuilder->buildRequest($resource, $requestTransfer);
    }

    /**
     * @param string $resource
     * @param BladeFxReportPreviewRequestTransfer $requestTransfer
     * @return RequestInterface
     */
    public function getReportPreview(
        string $resource,
        BladeFxReportPreviewRequestTransfer $requestTransfer
    ): RequestInterface {
        $validator = $this->requestFactory->createReportPreviewRequestValidator();
        $this->validateRequest($validator, $requestTransfer);

        return $this->requestBuilder->buildRequest($resource, $requestTransfer);
    }

    /**
     * @param string $resource
     * @param BladeFxSetFavoriteReportRequestTransfer $requestTransfer
     * @return RequestInterface
     */
    public function getSetFavoriteReportRequest(
        string $resource,
        BladeFxSetFavoriteReportRequestTransfer $requestTransfer
    ): RequestInterface {
        $validator = $this->requestFactory->createSetFavoriteReportRequestValidator();
        $this->validateRequest($validator, $requestTransfer);

        return $this->requestBuilder->buildRequest($resource, $requestTransfer);
    }

    /**
     * @param RequestValidatorInterface $validator
     * @param AbstractTransfer $request
     * @return void
     */
    private function validateRequest(RequestValidatorInterface $validator, AbstractTransfer $request): void
    {
        if (!$validator->isRequestValid($request)) {
            $this->logError($request);

            throw new ReportsRequestException();
        }
    }

    /**
     * @param AbstractTransfer $requestTransfer
     * @return void
     */
    private function logError(AbstractTransfer $requestTransfer): void
    {
        $this->logger->critical(
            $this->formatErrorMessage(),
            $this->createArrayWithTransferData($requestTransfer),
        );
    }

    /**
     * @return string
     */
    private function formatErrorMessage(): string
    {
        return sprintf(
            self::ERROR_INVALID_REQUEST_PARAMETERS,
            BladeFxApiConfig::LOG_MESSAGE_PREFIX,
        );
    }

    /**
     * @param AbstractTransfer $requestTransfer
     * @return AbstractTransfer[]
     */
    private function createArrayWithTransferData(AbstractTransfer $requestTransfer): array
    {
        return [
            static::LOGGER_TYPE_TRANSFER => $requestTransfer,
        ];
    }

    /**
     * @param RequestBuilderInterface $requestBuilder
     * @return void
     */
    public function setRequestBuilder(RequestBuilderInterface $requestBuilder): void
    {
        $this->requestBuilder = $requestBuilder;
    }
}

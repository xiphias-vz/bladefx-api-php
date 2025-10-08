<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Request\Validator;

use Psr\Log\LoggerInterface;
use Xiphias\BladeFxApi\BladeFxApiConfig;
use Xiphias\BladeFxApi\DTO\AbstractTransfer;
use Xiphias\BladeFxApi\Exception\ReportsRequestException;

abstract class AbstractRequestValidator implements RequestValidatorInterface
{
    /**
     * @var string
     */
    private const ERROR_INVALID_REQUEST_PARAMETERS = '%s Incorrect request transfer provided for request validator.';

    /**
     * @var string
     */
    protected const LOGGER_TYPE_TRANSFER = 'transfer';

    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @return string
     */
    abstract protected function getRequestTransferClass(): string;

    /**
     * @param AbstractTransfer $requestTransfer
     * @return bool
     */
    abstract protected function validateRequest(AbstractTransfer $requestTransfer): bool;

    /**
     * @param AbstractTransfer $requestTransfer
     * @return bool
     */
    public function isRequestValid(AbstractTransfer $requestTransfer): bool
    {
        $requestTransferClass = $this->getRequestTransferClass();
        if (!$this->isRequestTransferClassCorrect($requestTransfer, $requestTransferClass)) {
            $this->logError($requestTransfer);

            throw new ReportsRequestException();
        }

        return $this->validateRequest($requestTransfer);
    }

    /**
     * @param AbstractTransfer $requestTransfer
     * @param string $className
     * @return bool
     */
    private function isRequestTransferClassCorrect(AbstractTransfer $requestTransfer, string $className): bool
    {
        return $className === get_class($requestTransfer);
    }

    /**
     * @param AbstractTransfer $requestTransfer
     * @return void
     */
    private function logError(AbstractTransfer $requestTransfer): void
    {
        $this->logger->critical(
            $this->formatMessage(),
            $this->createTransferLogger($requestTransfer),
        );
    }

    /**
     * @return string
     */
    private function formatMessage(): string
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
    private function createTransferLogger(AbstractTransfer $requestTransfer): array
    {
        return [
            static::LOGGER_TYPE_TRANSFER => $requestTransfer,
        ];
    }
}

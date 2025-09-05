<?php


namespace Xiphias\BladeFxApi\Response\Validator;

use Xiphias\BladeFxApi\DTO\AbstractTransfer;
use Psr\Log\LoggerInterface;
use Xiphias\BladeFxApi\Response\Exception\ReportsResponseException;

abstract class AbstractResponseValidator implements ResponseValidatorInterface
{
    /**
     * @var string
     */
    private const ERROR_INVALID_RESPONSE_PARAMETERS = '%s Incorrect response transfer provided for request validator.';

    /**
     * @var string
     */
    private const LOG_MESSAGE_PREFIX = 'BladeFxAPIClient: ';

    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\AbstractTransfer $responseTransfer
     *
     * @return bool
     * @throws \Xiphias\BladeFxApi\Response\Exception\ReportsResponseException
     *
     */
    public function isResponseValid(AbstractTransfer $responseTransfer): bool
    {
        $responseTransferClass = $this->getResponseTransferClass();
        if (!$this->isResponseTransferClassCorrect($responseTransfer, $responseTransferClass)) {
            $this->logError($responseTransfer);

            throw new ReportsResponseException();
        }

        return $this->validateResponse($responseTransfer);
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\AbstractTransfer $responseTransfer
     *
     * @return bool
     */
    abstract protected function validateResponse(AbstractTransfer $responseTransfer): bool;

    /**
     * @return string
     */
    abstract protected function getResponseTransferClass(): string;

    /**
     * @param \Xiphias\BladeFxApi\DTO\AbstractTransfer $responseTransfer
     * @param string $className
     *
     * @return bool
     */
    private function isResponseTransferClassCorrect(AbstractTransfer $responseTransfer, string $className): bool
    {
        return $className === get_class($responseTransfer);
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\AbstractTransfer $responseTransfer
     *
     * @return void
     */
    private function logError(AbstractTransfer $responseTransfer): void
    {
        $this->logger->critical(
            $this->formatMessage(),
            $this->createTransferLogger($responseTransfer),
        );
    }

    /**
     * @return string
     */
    private function formatMessage(): string
    {
        return sprintf(
            self::ERROR_INVALID_RESPONSE_PARAMETERS,
            self::LOG_MESSAGE_PREFIX,
        );
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\AbstractTransfer $responseTransfer
     *
     * @return array<\Xiphias\BladeFxApi\DTO\AbstractTransfer>
     */
    private function createTransferLogger(AbstractTransfer $responseTransfer): array
    {
        return [
            'transfer' => $responseTransfer,
        ];
    }
}

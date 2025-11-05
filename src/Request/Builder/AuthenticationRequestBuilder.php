<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Request\Builder;

use Xiphias\BladeFxApi\BladeFxApiConfig;
use Xiphias\BladeFxApi\DTO\AbstractTransfer;
use Xiphias\BladeFxApi\Request\Formatter\RequestBodyFormatterInterface;

class AuthenticationRequestBuilder extends AbstractRequestBuilder
{
    /**
     * @var array<mixed>
     */
    protected array $fieldFormatterPlugins;

    /**
     * @param \Xiphias\BladeFxApi\BladeFxApiConfig $apiClientConfig
     * @param \Xiphias\BladeFxApi\Request\Formatter\RequestBodyFormatterInterface $bodyFormatter
     * @param array<mixed> $fieldFormatterPlugins
     */
    public function __construct(
        BladeFxApiConfig $apiClientConfig,
        RequestBodyFormatterInterface $bodyFormatter,
        array $fieldFormatterPlugins
    ) {
        parent::__construct($apiClientConfig, $bodyFormatter);

        $this->fieldFormatterPlugins = $fieldFormatterPlugins;
    }

    /**
     * @return string
     */
    public function getMethodName(): string
    {
        return parent::METHOD_POST;
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\AbstractTransfer $requestTransfer
     *
     * @return array<string, string>
     */
    public function getAdditionalHeaders(AbstractTransfer $requestTransfer): array
    {
        return [];
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\AbstractTransfer $requestTransfer
     *
     * @return string
     */
    protected function getEncodedData(AbstractTransfer $requestTransfer): string
    {
        /** @var \Xiphias\BladeFxApi\DTO\BladeFxAuthenticationRequestTransfer $bladeFxAuthenticationRequestTransfer */
        $bladeFxAuthenticationRequestTransfer = $requestTransfer;

        $data = $bladeFxAuthenticationRequestTransfer->toArray();

        $this->executeFormatterPlugins($data);

        return $this->encodeJson($data);
    }

    /**
     * @param array<mixed> $data
     *
     * @return array<mixed>
     */
    protected function executeFormatterPlugins(array $data): array
    {
        foreach ($this->fieldFormatterPlugins as $fieldFormatterPlugin) {
            $data = $fieldFormatterPlugin->format($data);
        }

        return $data;
    }
}

<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Request\Builder;

use Xiphias\BladeFxApi\BladeFxApiConfig;
use Xiphias\BladeFxApi\DTO\AbstractTransfer;
use Xiphias\BladeFxApi\Request\Formatter\RequestBodyFormatterInterface;

class AuthenticationRequestBuilder extends AbstractRequestBuilder
{
    /**
     * @var array
     */
    protected array $fieldFormatterPlugins;

    /**
     * @param BladeFxApiConfig $apiClientConfig
     * @param RequestBodyFormatterInterface $bodyFormatter
     * @param array $fieldFormatterPlugins
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
     * @param AbstractTransfer $requestTransfer
     * @return array
     */
    public function getAdditionalHeaders(AbstractTransfer $requestTransfer): array
    {
        return [];
    }

    /**
     * @param AbstractTransfer $requestTransfer
     * @return string
     */
    protected function getEncodedData(AbstractTransfer $requestTransfer): string
    {
        $data = $requestTransfer->toArray(true, true);

        $this->executeFormatterPlugins($data);

        return $this->encodeJson($data);
    }

    /**
     * @param array $data
     *
     * @return array
     */
    protected function executeFormatterPlugins(array $data): array
    {
        foreach ($this->fieldFormatterPlugins as $fieldFormatterPlugin) {
            $data = $fieldFormatterPlugin->format($data);
        }

        return $data;
    }
}

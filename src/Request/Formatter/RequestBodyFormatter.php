<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Request\Formatter;

use Xiphias\BladeFxApi\BladeFxApiConfig;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportPreviewRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxParameterTransfer;

class RequestBodyFormatter implements RequestBodyFormatterInterface
{
    /**
     * @var \Xiphias\BladeFxApi\BladeFxApiConfig
     */
    protected BladeFxApiConfig $config;

    /**
     * @param \Xiphias\BladeFxApi\BladeFxApiConfig $config
     */
    public function __construct(BladeFxApiConfig $config)
    {
        $this->config = $config;
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxGetReportPreviewRequestTransfer $requestTransfer
     *
     * @return array<mixed>
     */
    public function formatDataBeforeEncoding(BladeFxGetReportPreviewRequestTransfer $requestTransfer): array
    {
        $data = $requestTransfer->toArray();

        $data = $this->changeArrayFromCamelCaseToSnakeCase($data);
        if ($this->parameterTransferIsValid($requestTransfer->getParams())) {
            return $this->mergeParametersWithData($data, $requestTransfer->getParams());
        }

        return $data;
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxParameterTransfer|null $parameterTransfer
     *
     * @return bool
     */
    public function parameterTransferIsValid(?BladeFxParameterTransfer $parameterTransfer): bool
    {
        if ($parameterTransfer) {
            if ($parameterTransfer->getParamName() && $parameterTransfer->getParamValue()) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param array<mixed> $data
     * @param \Xiphias\BladeFxApi\DTO\BladeFxParameterTransfer|null $parameterTransfer
     *
     * @return array<mixed>
     */
    public function mergeParametersWithData(array $data, ?BladeFxParameterTransfer $parameterTransfer): array
    {
        $params = $parameterTransfer->toArray();
        $data['params'] = [$this->changeArrayFromCamelCaseToSnakeCase($params)];
        $data['imageFormat'] = '';

        return $data;
    }

    /**
     * @param array<mixed> $data
     *
     * @return array<mixed>
     */
    public function changeArrayFromCamelCaseToSnakeCase(array $data): array
    {
        $changedData = [];
        $keysToChangeFromCamelCase = $this->config->getKeysToChangeFromCamelCaseToSnakeCase();

        foreach ($data as $camelKey => $value) {
            if (array_key_exists($camelKey, $keysToChangeFromCamelCase)) {
                $changedData[$this->changeKeyFromCamelCaseToSnakeCase($camelKey)] = $value;
            } else {
                $changedData[$camelKey] = $value;
            }
        }

        return $changedData;
    }

    /**
     * @param string $camelKey
     *
     * @return string
     */
    private function changeKeyFromCamelCaseToSnakeCase(string $camelKey): string
    {
        $result = '';
        $camelKeyLen = strlen($camelKey);

        for ($i = 0; $i < $camelKeyLen; $i++) {
            $char = $camelKey[$i];

            if (ctype_upper($char)) {
                $result .= '_' . strtolower($char);
            } else {
                $result .= $char;
            }
        }

        return ltrim($result, '_');
    }
}

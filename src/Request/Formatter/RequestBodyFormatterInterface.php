<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Request\Formatter;

use Xiphias\BladeFxApi\DTO\BladeFxGetReportPreviewRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxParameterListTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxParameterTransfer;

interface RequestBodyFormatterInterface
{
    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxGetReportPreviewRequestTransfer $requestTransfer
     *
     * @return array<mixed>
     */
    public function formatDataBeforeEncoding(BladeFxGetReportPreviewRequestTransfer $requestTransfer): array;

    /**
     * @param array<mixed> $data
     * @param \Xiphias\BladeFxApi\DTO\BladeFxParameterListTransfer|null $parameterTransfer
     *
     * @return array<mixed>
     */
    public function mergeParametersWithData(array $data, ?BladeFxParameterListTransfer $parameterTransfer): array;

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxParameterTransfer|null $parameterTransfer
     *
     * @return bool
     */
    public function parameterTransferIsValid(?BladeFxParameterTransfer $parameterTransfer): bool;

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxParameterListTransfer|null $parameterTransfer
     *
     * @return bool
     */
    public function parameterListTransferIsValid(?BladeFxParameterListTransfer $parameterListTransfer): bool;

    /**
     * @param array<mixed> $data
     *
     * @return array<mixed>
     */
    public function changeArrayFromCamelCaseToSnakeCase(array $data): array;
}

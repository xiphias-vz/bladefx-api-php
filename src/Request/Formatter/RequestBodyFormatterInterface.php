<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Request\Formatter;

use Xiphias\BladeFxApi\DTO\BladeFxParameterTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxReportPreviewRequestTransfer;

interface RequestBodyFormatterInterface
{
    /**
     * @param BladeFxReportPreviewRequestTransfer $requestTransfer
     * @return array<mixed>
     */
    public function formatDataBeforeEncoding(BladeFxReportPreviewRequestTransfer $requestTransfer): array;

    /**
     * @param array<mixed> $data
     * @param BladeFxParameterTransfer|null $parameterTransfer
     * @return array<mixed>
     */
    public function mergeParametersWithData(array $data, ?BladeFxParameterTransfer $parameterTransfer): array;

    /**
     * @param BladeFxParameterTransfer|null $parameterTransfer
     * @return bool
     */
    public function parameterTransferIsValid(?BladeFxParameterTransfer $parameterTransfer): bool;

    /**
     * @param array<mixed> $data
     * @return array<mixed>
     */
    public function changeArrayFromCamelCaseToSnakeCase(array $data): array;
}

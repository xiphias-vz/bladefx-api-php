<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Resources\ReportData;

class ReportData
{
    public ?string $host_address = null;
    public string $returnType = 'JSON';
    public array $reportParams;

    /**
     * @param string|null $host_address
     * @param string $returnType
     * @param array $reportParams
     */
    public function __construct(
        ?string $host_address = null,
        string $returnType = 'JSON',
        array $reportParams = []
    ) {
        $this->host_address = $host_address;
        $this->returnType = $returnType;
        $this->reportParams = $reportParams;
    }
}

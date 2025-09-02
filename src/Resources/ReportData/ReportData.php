<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Resources\ReportData;

class ReportData
{
    public ?string $host_address = null;
    public ?string $rootUrl = null;
    public string $returnType = 'JSON';

    /**
     * @param string|null $host_address
     * @param string $returnType
     */
    public function __construct(
        ?string $host_address = null,
        ?string $rootUrl = null,
        string $returnType = 'JSON'
    ) {
        $this->host_address = $host_address;
        $this->rootUrl = $rootUrl;
        $this->returnType = $returnType;
    }
}

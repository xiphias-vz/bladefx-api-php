<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Resources;

class ReportParams
{
    public ?int $rep_id = null;
    public ?string $host_address = null;
    public string $returnType = 'JSON';

    /**
     * @param int|null $rep_id
     * @param string|null $host_address
     * @param string $returnType
     */
    public function __construct(
        ?int $rep_id = null,
        ?string $host_address = null,
        string $returnType = 'JSON'
    ) {
        $this->rep_id = $rep_id;
        $this->host_address = $host_address;
        $this->returnType = $returnType;
    }
}

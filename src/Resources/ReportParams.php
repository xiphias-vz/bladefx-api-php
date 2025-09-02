<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Resources;

class ReportParams
{
    public ?int $rep_id = null;
    public string $host_address;
    public string $returnType = 'JSON';

    /**
     * @param int|null $rep_id
     * @param string $host_address
     * @param string $returnType
     */
    public function __construct(
        string $host_address,
        ?int $rep_id = null,
        string $returnType = 'JSON'
    ) {
        $this->host_address = $host_address;
        $this->rep_id = $rep_id;
        $this->returnType = $returnType;
    }
}

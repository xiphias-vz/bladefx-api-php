<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxReportsListResponseTransfer extends AbstractTransfer
{
    private int $statusCode;
    private array $reportsList;

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @param int $statusCode
     * @return void
     */
    public function setStatusCode(int $statusCode): void
    {
        $this->statusCode = $statusCode;
    }

    /**
     * @return array<BladeFxReportTransfer>
     */
    public function getReportsList(): array
    {
        return $this->reportsList;
    }

    /**
     * @param array<BladeFxReportTransfer> $reportsList
     * @return void
     */
    public function setReportsList(array $reportsList): void
    {
        $this->reportsList = $reportsList;
    }
}

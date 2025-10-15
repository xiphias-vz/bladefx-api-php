<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxReportsListResponseTransfer extends AbstractTransfer
{
    /**
     * @var int
     */
    protected int $statusCode = 0;

    /**
     * @var array<BladeFxReportTransfer>
     */
    protected array $reportsList = [];

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

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $transfers = [];
        foreach ($this->getReportsList() as $transfer) {
            $transfers[] = $transfer->toArray();
        }

        return [
            'statusCode' => $this->getStatusCode(),
            'reportsList' => $transfers,
        ];
    }
}

<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxGetReportsListResponseTransfer extends AbstractTransfer
{
    /**
     * @var int|null
     */
    protected ?int $statusCode = 0;

    /**
     * @var array<\Xiphias\BladeFxApi\DTO\BladeFxReportTransfer>|null
     */
    protected ?array $reportsList = [];

    /**
     * @return int|null
     */
    public function getStatusCode(): ?int
    {
        return $this->statusCode;
    }

    /**
     * @param int|null $statusCode
     *
     * @return $this
     */
    public function setStatusCode(?int $statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @return array<\Xiphias\BladeFxApi\DTO\BladeFxReportTransfer>|null
     */
    public function getReportsList(): ?array
    {
        return $this->reportsList;
    }

    /**
     * @param array<\Xiphias\BladeFxApi\DTO\BladeFxReportTransfer>|null $reportsList
     *
     * @return $this
     */
    public function setReportsList(?array $reportsList)
    {
        $this->reportsList = $reportsList;

        return $this;
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

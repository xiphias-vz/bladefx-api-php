<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxGetReportByFormatResponseTransfer extends AbstractTransfer
{
    /**
     * @var string
     */
    public const STATUS_CODE = 'statusCode';

    /**
     * @var string
     */
    public const REPORT = 'report';

    /**
     * @var int|null
     */
    protected ?int $statusCode;

    /**
     * @var string|null
     */
    protected ?string $report;

    /**
     * @return int|null
     */
    public function getStatusCode(): ?int
    {
        return $this->statusCode;
    }

    /**
     * @param int|null $statusCode
     * @return $this
     */
    public function setStatusCode(?int $statusCode): self
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireStatusCode(): self
    {
        $this->assertPropertyIsSet(self::STATUS_CODE);

        return $this;
    }

    /**
     * @return string|null
     */
    public function getReport(): ?string
    {
        return $this->report;
    }

    /**
     * @param string|null $report
     * @return $this
     */
    public function setReport(?string $report = null): self
    {
        $this->report = $report;
        return $this;
    }

    /**
     * @return $this
     */
    public function requireReport(): self
    {
        $this->assertPropertyIsSet(static::REPORT);

        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'statusCode' => $this->getStatusCode(),
            'report' => $this->getReport(),
        ];
    }
}

<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxParameterTransfer extends AbstractTransfer
{
    /**
     * @var int|null
     */
    protected ?int $reportId;

    /**
     * @var string|null
     */
    protected ?string $paramName;

    /**
     * @var string|null
     */
    protected ?string $paramValue;

    /**
     * @var string|null
     */
    protected ?string $sqlDbType;

    /**
     * @return int|null
     */
    public function getReportId(): ?int
    {
        return $this->reportId;
    }

    /**
     * @param int|null $reportId
     * @return $this
     */
    public function setReportId(?int $reportId): self
    {
        $this->reportId = $reportId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getParamName(): ?string
    {
        return $this->paramName;
    }

    /**
     * @param string|null $paramName
     * @return $this
     */
    public function setParamName(?string $paramName): self
    {
        $this->paramName = $paramName;

        return $this;
    }

    /**
     * @return ?string
     */
    public function getParamValue(): ?string
    {
        return $this->paramValue;
    }

    /**
     * @param ?string $paramValue
     * @return $this
     */
    public function setParamValue(?string $paramValue): self
    {
        $this->paramValue = $paramValue;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSqlDbType(): ?string
    {
        return $this->sqlDbType;
    }

    /**
     * @param string|null $sqlDbType
     * @return $this
     */
    public function setSqlDbType(?string $sqlDbType): self
    {
        $this->sqlDbType = $sqlDbType;

        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'reportId' => $this->getReportId(),
            'paramName' => $this->getParamName(),
            'paramValue' => $this->getParamValue(),
            'sqlDbType' => $this->getSqlDbType(),
        ];
    }
}

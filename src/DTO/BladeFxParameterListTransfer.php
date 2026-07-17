<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxParameterListTransfer extends AbstractTransfer
{
    /**
     * @var string
     */
    public const PARAMETER_LIST = 'parameterList';

    /**
     * @var string
     */
    public const REPORT_ID = 'reportId';

    /**
     * @var string
     */
    public const SQL_DB_TYPE = 'sqlDbType';

    /**
     * @var int|null
     */
    protected ?int $reportId = null;

    /**
     * @var string|null
     */
    protected ?string $sqlDbType = null;

    /**
     * @var array<\Xiphias\BladeFxApi\DTO\BladeFxParameterTransfer>|null
     */
    protected ?array $parameterList = [];

    /**
     * @return int|null
     */
    public function getReportId(): ?int
    {
        return $this->reportId;
    }

    /**
     * @param int|null $reportId
     *
     * @return $this
     */
    public function setReportId(?int $reportId)
    {
        $this->reportId = $reportId;

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
     *
     * @return $this
     */
    public function setSqlDbType(?string $sqlDbType)
    {
        $this->sqlDbType = $sqlDbType;

        return $this;
    }


    /**
     * @return array<\Xiphias\BladeFxApi\DTO\BladeFxParameterTransfer>|null
     */
    public function getParameterList(): ?array
    {
        return $this->parameterList;
    }

    /**
     * @param array<\Xiphias\BladeFxApi\DTO\BladeFxParameterTransfer>|null $parameterList
     *
     * @return $this
     */
    public function setParameterList(?array $parameterList)
    {
        $this->parameterList = $parameterList;

        return $this;
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxParameterTransfer $bladeFxParameter
     *
     * @return $this
     */
    public function addBladeFxParameter(BladeFxParameterTransfer $bladeFxParameter)
    {
        $this->parameterList[] = $bladeFxParameter;
        $this->modifiedProperties[self::PARAMETER_LIST] = true;

        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $transfers = [];
        foreach ($this->getParameterList() as $transfer) {
            $transfers[] = $transfer->toArray();
        }

        return [
            static::PARAMETER_LIST => $transfers,
            static::REPORT_ID => $this->getReportId(),
            static::SQL_DB_TYPE => $this->getSqlDbType(),
        ];
    }
}

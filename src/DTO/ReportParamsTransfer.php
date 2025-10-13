<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

use JsonSerializable;

class ReportParamsTransfer extends AbstractTransfer implements JsonSerializable
{
    public function __construct(
        public int $param_id = 0,
        public string $paramName = '',
        public string $sqlDbType = '',
        public string $paramValue = '',
        public string $paramDefaultValue = '',
        public bool $isList = true,
        public bool $isCustomField = true,
    ) {
        parent::__construct();
    }

    /**
     * @return int
     */
    public function getParamId(): int
    {
        return $this->param_id;
    }

    /**
     * @param int $param_id
     * @return void
     */
    public function setParamId(int $param_id): void
    {
        $this->param_id = $param_id;
    }

    /**
     * @return string
     */
    public function getParamName(): string
    {
        return $this->paramName;
    }

    /**
     * @param string $paramName
     * @return void
     */
    public function setParamName(string $paramName): void
    {
        $this->paramName = $paramName;
    }

    /**
     * @return string
     */
    public function getSqlDbType(): string
    {
        return $this->sqlDbType;
    }

    /**
     * @param string $sqlDbType
     * @return void
     */
    public function setSqlDbType(string $sqlDbType): void
    {
        $this->sqlDbType = $sqlDbType;
    }

    /**
     * @return string
     */
    public function getParamValue(): string
    {
        return $this->paramValue;
    }

    /**
     * @param string $paramValue
     * @return void
     */
    public function setParamValue(string $paramValue): void
    {
        $this->paramValue = $paramValue;
    }

    /**
     * @return string
     */
    public function getParamDefaultValue(): string
    {
        return $this->paramDefaultValue;
    }

    /**
     * @param string $paramDefaultValue
     * @return void
     */
    public function setParamDefaultValue(string $paramDefaultValue): void
    {
        $this->paramDefaultValue = $paramDefaultValue;
    }

    /**
     * @return bool
     */
    public function getIsList(): bool
    {
        return $this->isList;
    }

    /**
     * @param bool $isList
     * @return void
     */
    public function setIsList(bool $isList): void
    {
        $this->isList = $isList;
    }

    /**
     * @return bool
     */
    public function getIsCustomField(): bool
    {
        return $this->isCustomField;
    }

    /**
     * @param bool $isCustomField
     * @return void
     */
    public function setIsCustomField(bool $isCustomField): void
    {
        $this->isCustomField = $isCustomField;
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'param_id' => $this->param_id,
            'paramName' => $this->paramName,
            'sqlDbType' => $this->sqlDbType,
            'paramValue' => $this->paramValue,
            'paramDefaultValue' => $this->paramDefaultValue,
            'isList' => $this->isList,
            'isCustomField' => $this->isCustomField,
        ];
    }
}

<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxParameterTransfer extends AbstractTransfer
{
    /**
     * @var int
     */
    protected int $param_id;

    /**
     * @var string
     */
    protected string $paramName;

    /**
     * @var string
     */
    protected string $paramValue;

    /**
     * @var string
     */
    protected string $sqlDbType;

    /**
     * @var string
     */
    protected string $paramDefaultValue = "";

    /**
     * @var bool
     */
    protected bool $isList = true;

    /**
     * @var bool
     */
    protected bool $isCustomField = true;

    /**
     * @return int
     */
    public function getParamId(): int
    {
        return $this->param_id;
    }

    /**
     * @param int $param_id
     * @return self
     */
    public function setParamId(int $param_id): self
    {
        $this->param_id = $param_id;

        return $this;
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
     * @return $this
     */
    public function setParamName(string $paramName): self
    {
        $this->paramName = $paramName;

        return $this;
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
     * @return $this
     */
    public function setParamValue(string $paramValue): self
    {
        $this->paramValue = $paramValue;

        return $this;
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
     * @return $this
     */
    public function setSqlDbType(string $sqlDbType): self
    {
        $this->sqlDbType = $sqlDbType;

        return $this;
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
     * @return $this
     */
    public function setParamDefaultValue(string $paramDefaultValue): self
    {
        $this->paramDefaultValue = $paramDefaultValue;

        return $this;
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
     * @return $this
     */
    public function setIsList(bool $isList): self
    {
        $this->isList = $isList;

        return $this;
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
     * @return $this
     */
    public function setIsCustomField(bool $isCustomField): self
    {
        $this->isCustomField = $isCustomField;

        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'param_id' => $this->getParamId(),
            'paramName' => $this->getParamName(),
            'paramValue' => $this->getParamValue(),
            'sqlDbType' => $this->getSqlDbType(),
            'paramDefaultValue' => $this->getParamDefaultValue(),
            'isList' => $this->getIsList(),
            'isCustomField' => $this->getIsCustomField(),
        ];
    }
}

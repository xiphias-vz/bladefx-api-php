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
     * @var array<BladeFxParameterTransfer>|null
     */
    protected ?array $parameterList = [];

    /**
     * @return array<BladeFxParameterTransfer>|null
     */
    public function getParameterList(): ?array
    {
        return $this->parameterList;
    }

    /**
     * @param array<BladeFxParameterTransfer>|null $parameterList
     * @return $this
     */
    public function setParameterList(?array $parameterList): self
    {
        $this->parameterList = $parameterList;

        return $this;
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxParameterTransfer $bladeFxParameter
     * @return $this
     */
    public function addBladeFxParameter(BladeFxParameterTransfer $bladeFxParameter): self
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
        ];
    }
}

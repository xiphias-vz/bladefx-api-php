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
     * @var array<BladeFxParameterTransfer>
     */
    protected array $parameterList = [];

    /**
     * @return array<BladeFxParameterTransfer>
     */
    public function getParameterList(): array
    {
        return $this->parameterList;
    }

    /**
     * @param array<BladeFxParameterTransfer> $parameterList
     * @return $this
     */
    public function setParameterList(array $parameterList): self
    {
        $this->parameterList = $parameterList;

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

<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxReportParamsRequestTransfer extends AbstractTransfer
{
    /**
     * @var int|null
     */
    protected ?int $rep_id = null;

    /**
     * @var string
     */
    protected string $host_address;

    /**
     * @var string
     */
    protected string $returnType = 'JSON';

    /**
     * @return int
     */
    public function getRepId(): int
    {
        return $this->rep_id;
    }

    /**
     * @param int $rep_id
     * @return void
     */
    public function setRepId(int $rep_id): void
    {
        $this->rep_id = $rep_id;
    }

    /**
     * @return string
     */
    public function getHostAddress(): string
    {
        return $this->host_address;
    }

    /**
     * @param string $host_address
     * @return void
     */
    public function setHostAddress(string $host_address): void
    {
        $this->host_address = $host_address;
    }

    /**
     * @return string
     */
    public function getReturnType(): string
    {
        return $this->returnType;
    }

    /**
     * @param string $returnType
     * @return void
     */
    public function setReturnType(string $returnType): void
    {
        $this->returnType = $returnType;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'rep_id' => $this->rep_id,
            'host_address' => $this->host_address,
            'returnType' => $this->returnType,
        ];
    }
}

<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxReportDataRequestTransfer extends AbstractTransfer
{
    /**
     * @var int|null
     */
    protected ?int $rep_id = null;

    /**
     * @var string|null
     */
    protected ?string $rootUrl = null;

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
    public function getRootUrl(): string
    {
        return $this->rootUrl;
    }

    /**
     * @param string $rootUrl
     * @return void
     */
    public function setRootUrl(string $rootUrl): void
    {
        $this->rootUrl = $rootUrl;
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
            'rootUrl' => $this->rootUrl,
            'returnType' => $this->returnType,
        ];
    }
}

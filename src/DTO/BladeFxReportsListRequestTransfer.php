<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxReportsListRequestTransfer extends AbstractTransfer
{
    /**
     * @var int|null
     */
    protected ?int $catId = null;

    /**
     * @var string|null
     */
    protected ?string $search = null;

    /**
     * @var string
     */
    protected string $returnType = 'JSON';

    /**
     * @var bool
     */
    protected bool $mobileLayoutOnly = false;

    /**
     * @var string|null
     */
    protected ?string $attribute = null;

    /**
     * @return int
     */
    public function getCatId(): int
    {
        return $this->catId;
    }

    /**
     * @param int $catId
     * @return void
     */
    public function setCatId(int $catId): void
    {
        $this->catId = $catId;
    }

    /**
     * @return string
     */
    public function getSearch(): string
    {
        return $this->search;
    }

    /**
     * @param string $search
     * @return void
     */
    public function setSearch(string $search): void
    {
        $this->search = $search;
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
     * @return bool
     */
    public function getMobileLayoutOnly(): bool
    {
        return $this->mobileLayoutOnly;
    }

    /**
     * @param bool $mobileLayoutOnly
     * @return void
     */
    public function setMobileLayoutOnly(bool $mobileLayoutOnly): void
    {
        $this->mobileLayoutOnly = $mobileLayoutOnly;
    }

    /**
     * @return string
     */
    public function getAttribute(): string
    {
        return $this->attribute;
    }

    /**
     * @param string $attribute
     * @return void
     */
    public function setAttribute(string $attribute): void
    {
        $this->attribute = $attribute;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'catId' => $this->catId,
            'search' => $this->search,
            'returnType' => $this->returnType,
            'mobileLayoutOnly' => $this->mobileLayoutOnly,
            'attribute' => $this->attribute,
        ];
    }
}

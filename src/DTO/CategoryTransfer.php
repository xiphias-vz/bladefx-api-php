<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class CategoryTransfer extends AbstractTransfer
{
    private int $catId;
    private int $companyId;
    private int $catParentId;
    private string $catName;
    private string $catDescription;
    private int $catSort;
    private bool $catActive;
    private string $dCreated;
    private string $dChanged;
    private int $reportCount;
    private bool $isActiveTree;

    public function getCatId(): int
    {
        return $this->catId;
    }

    public function setCatId(int $catId): self
    {
        $this->catId = $catId;
        return $this;
    }

    public function getCompanyId(): int
    {
        return $this->companyId;
    }

    public function setCompanyId(int $companyId): self
    {
        $this->companyId = $companyId;
        return $this;
    }

    public function getCatParentId(): int
    {
        return $this->catParentId;
    }

    public function setCatParentId(int $catParentId): self
    {
        $this->catParentId = $catParentId;
        return $this;
    }

    public function getCatName(): string
    {
        return $this->catName;
    }

    public function setCatName(string $catName): self
    {
        $this->catName = $catName;
        return $this;
    }

    public function getCatDescription(): string
    {
        return $this->catDescription;
    }

    public function setCatDescription(string $catDescription): self
    {
        $this->catDescription = $catDescription;
        return $this;
    }

    public function getCatSort(): int
    {
        return $this->catSort;
    }

    public function setCatSort(int $catSort): self
    {
        $this->catSort = $catSort;
        return $this;
    }

    public function isCatActive(): bool
    {
        return $this->catActive;
    }

    public function setCatActive(bool $catActive): self
    {
        $this->catActive = $catActive;
        return $this;
    }

    public function getDCreated(): string
    {
        return $this->dCreated;
    }

    public function setDCreated(string $dCreated): self
    {
        $this->dCreated = $dCreated;
        return $this;
    }

    public function getDChanged(): string
    {
        return $this->dChanged;
    }

    public function setDChanged(string $dChanged): self
    {
        $this->dChanged = $dChanged;
        return $this;
    }

    public function getReportCount(): int
    {
        return $this->reportCount;
    }

    public function setReportCount(int $reportCount): self
    {
        $this->reportCount = $reportCount;
        return $this;
    }

    public function isActiveTree(): bool
    {
        return $this->isActiveTree;
    }

    public function setIsActiveTree(bool $isActiveTree): self
    {
        $this->isActiveTree = $isActiveTree;
        return $this;
    }
}

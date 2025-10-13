<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxCategoryTransfer extends AbstractTransfer
{
    /**
     * @var string
     */
    public const CAT_ID = 'catId';

    protected int $catId;
    protected ?int $companyId;
    protected ?int $catParentId;
    protected ?string $catName;
    protected ?string $catDescription;
    protected ?int $catSort;
    protected ?bool $catActive;
    protected ?string $dCreated;
    protected ?string $dChanged;
    protected ?int $reportCount;
    protected ?bool $isActiveTree;

    /**
     * @var array<string, string>
     */
    protected $transferPropertyNameMap = [
       'cat_id' => 'catId',
       'company_id' => 'companyId',
       'cat_parent_id' => 'catParentId',
       'cat_name' => 'catName',
       'cat_description' => 'catDescription',
       'cat_sort' => 'catSort',
       'cat_active' => 'catActive',
       'dCreated' => 'dCreated',
       'dChanged' => 'dChanged',
       'reportCount' => 'reportCount',
    ];

    public function getCatId(): int
    {
        return $this->catId;
    }

    public function setCatId(int $catId): void
    {
        $this->catId = $catId;
        $this->modifiedProperties[self::CAT_ID] = true;
    }

    public function requireCatId()
    {
        $this->assertPropertyIsSet(self::CAT_ID);

        return $this;
    }

    public function getCompanyId(): int
    {
        return $this->companyId;
    }

    public function setCompanyId(int $companyId): void
    {
        $this->companyId = $companyId;
    }

    public function getCatParentId(): int
    {
        return $this->catParentId;
    }

    public function setCatParentId(int $catParentId): void
    {
        $this->catParentId = $catParentId;
    }

    public function getCatName(): string
    {
        return $this->catName;
    }

    public function setCatName(string $catName): void
    {
        $this->catName = $catName;
    }

    public function getCatDescription(): string
    {
        return $this->catDescription;
    }

    public function setCatDescription(string $catDescription): void
    {
        $this->catDescription = $catDescription;
    }

    public function getCatSort(): int
    {
        return $this->catSort;
    }

    public function setCatSort(int $catSort): void
    {
        $this->catSort = $catSort;
    }

    public function isCatActive(): bool
    {
        return $this->catActive;
    }

    public function setCatActive(bool $catActive): void
    {
        $this->catActive = $catActive;
    }

    public function getDCreated(): string
    {
        return $this->dCreated;
    }

    public function setDCreated(string $dCreated): void
    {
        $this->dCreated = $dCreated;
    }

    public function getDChanged(): string
    {
        return $this->dChanged;
    }

    public function setDChanged(string $dChanged): void
    {
        $this->dChanged = $dChanged;
    }

    public function getReportCount(): int
    {
        return $this->reportCount;
    }

    public function setReportCount(int $reportCount): void
    {
        $this->reportCount = $reportCount;
    }

    public function isActiveTree(): bool
    {
        return $this->isActiveTree;
    }

    public function setIsActiveTree(bool $isActiveTree): void
    {
        $this->isActiveTree = $isActiveTree;
    }

    public function fromArray(array $data, $ignoreMissingProperties = false)
    {
        foreach ($data as $property => $value) {
            $normalizedPropertyName = $this->transferPropertyNameMap[$property] ?? null;

            switch ($normalizedPropertyName) {
                case 'catId':
                case 'companyId':
                case 'catParentId':
                case 'catName':
                case 'catDescription':
                case 'catSort':
                case 'catActive':
                case 'dCreated':
                case 'dChanged':
                case 'reportCount':
                case 'isActiveTree':
                    $this->$normalizedPropertyName = $value;
                    $this->modifiedProperties[$normalizedPropertyName] = true;

                    break;
                default:
                    if (!$ignoreMissingProperties) {
                        throw new \InvalidArgumentException(sprintf('Missing property `%s` in `%s`', $property, static::class));
                    }
            }
        }

        return $this;
    }
}

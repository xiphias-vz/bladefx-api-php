<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxCategoryTransfer extends AbstractTransfer
{
    /**
     * @var string
     */
    public const CAT_ID = 'catId';

    /**
     * @var int
     */
    protected int $catId;

    /**
     * @var int|null
     */
    protected ?int $companyId;

    /**
     * @var int|null
     */
    protected ?int $catParentId;

    /**
     * @var string|null
     */
    protected ?string $catName;

    /**
     * @var string|null
     */
    protected ?string $catDescription;
    /**
     * @var int|null
     */
    protected ?int $catSort;

    /**
     * @var bool|null
     */
    protected ?bool $catActive;

    /**
     * @var string|null
     */
    protected ?string $dCreated;

    /**
     * @var string|null
     */
    protected ?string $dChanged;

    /**
     * @var int|null
     */
    protected ?int $reportCount;

    /**
     * @var bool|null
     */
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
        $this->modifiedProperties[self::CAT_ID] = true;
    }

    /**
     * @return $this
     */
    public function requireCatId()
    {
        $this->assertPropertyIsSet(self::CAT_ID);

        return $this;
    }

    /**
     * @return int
     */
    public function getCompanyId(): int
    {
        return $this->companyId;
    }

    /**
     * @param int $companyId
     * @return void
     */
    public function setCompanyId(int $companyId): void
    {
        $this->companyId = $companyId;
    }

    /**
     * @return int
     */
    public function getCatParentId(): int
    {
        return $this->catParentId;
    }

    /**
     * @param int $catParentId
     * @return void
     */
    public function setCatParentId(int $catParentId): void
    {
        $this->catParentId = $catParentId;
    }

    /**
     * @return string
     */
    public function getCatName(): string
    {
        return $this->catName;
    }

    /**
     * @param string $catName
     * @return void
     */
    public function setCatName(string $catName): void
    {
        $this->catName = $catName;
    }

    /**
     * @return string
     */
    public function getCatDescription(): string
    {
        return $this->catDescription;
    }

    /**
     * @param string $catDescription
     * @return void
     */
    public function setCatDescription(string $catDescription): void
    {
        $this->catDescription = $catDescription;
    }

    /**
     * @return int
     */
    public function getCatSort(): int
    {
        return $this->catSort;
    }

    /**
     * @param int $catSort
     * @return void
     */
    public function setCatSort(int $catSort): void
    {
        $this->catSort = $catSort;
    }

    /**
     * @return bool
     */
    public function isCatActive(): bool
    {
        return $this->catActive;
    }

    /**
     * @param bool $catActive
     * @return void
     */
    public function setCatActive(bool $catActive): void
    {
        $this->catActive = $catActive;
    }

    /**
     * @return string
     */
    public function getDCreated(): string
    {
        return $this->dCreated;
    }

    /**
     * @param string $dCreated
     * @return void
     */
    public function setDCreated(string $dCreated): void
    {
        $this->dCreated = $dCreated;
    }

    /**
     * @return string
     */
    public function getDChanged(): string
    {
        return $this->dChanged;
    }

    /**
     * @param string $dChanged
     * @return void
     */
    public function setDChanged(string $dChanged): void
    {
        $this->dChanged = $dChanged;
    }

    /**
     * @return int
     */
    public function getReportCount(): int
    {
        return $this->reportCount;
    }

    /**
     * @param int $reportCount
     * @return void
     */
    public function setReportCount(int $reportCount): void
    {
        $this->reportCount = $reportCount;
    }

    /**
     * @return bool
     */
    public function isActiveTree(): bool
    {
        return $this->isActiveTree;
    }

    /**
     * @param bool $isActiveTree
     * @return void
     */
    public function setIsActiveTree(bool $isActiveTree): void
    {
        $this->isActiveTree = $isActiveTree;
    }

    /**
     * @param array<mixed> $data
     * @param bool $ignoreMissingProperties
     * @return $this
     */
    public function fromArray(array $data, bool $ignoreMissingProperties = false): static
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

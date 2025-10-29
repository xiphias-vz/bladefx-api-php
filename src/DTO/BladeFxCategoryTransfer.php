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
     * @var int|null
     */
    protected ?int $catId = null;

    /**
     * @var int|null
     */
    protected ?int $companyId = null;

    /**
     * @var int|null
     */
    protected ?int $catParentId = null;

    /**
     * @var string|null
     */
    protected ?string $catName = null;

    /**
     * @var string|null
     */
    protected ?string $catDescription = null;
    /**
     * @var int|null
     */
    protected ?int $catSort = null;

    /**
     * @var bool|null
     */
    protected ?bool $catActive = null;

    /**
     * @var string|null
     */
    protected ?string $dCreated = null;

    /**
     * @var string|null
     */
    protected ?string $dChanged = null;

    /**
     * @var int|null
     */
    protected ?int $reportCount = null;

    /**
     * @var bool|null
     */
    protected ?bool $isActiveTree = null;

    /**
     * @var array<string, string>
     */
    protected array $transferPropertyNameMap = [
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
       'isActiveTree' => 'isActiveTree'
    ];

    /**
     * @return int|null
     */
    public function getCatId(): ?int
    {
        return $this->catId;
    }

    /**
     * @param int|null $catId
     * @return $this
     */
    public function setCatId(?int $catId = null): self
    {
        $this->catId = $catId;
        $this->modifiedProperties[self::CAT_ID] = true;

        return $this;
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
     * @return int|null
     */
    public function getCompanyId(): ?int
    {
        return $this->companyId;
    }

    /**
     * @param int|null $companyId
     * @return $this
     */
    public function setCompanyId(?int $companyId = null): self
    {
        $this->companyId = $companyId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getCatParentId(): ?int
    {
        return $this->catParentId;
    }

    /**
     * @param int|null $catParentId
     * @return $this
     */
    public function setCatParentId(?int $catParentId = null): self
    {
        $this->catParentId = $catParentId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCatName(): ?string
    {
        return $this->catName;
    }

    /**
     * @param string|null $catName
     * @return $this
     */
    public function setCatName(?string $catName = null): self
    {
        $this->catName = $catName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCatDescription(): ?string
    {
        return $this->catDescription;
    }

    /**
     * @param string|null $catDescription
     * @return $this
     */
    public function setCatDescription(?string $catDescription = null): self
    {
        $this->catDescription = $catDescription;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCatSort(): ?int
    {
        return $this->catSort;
    }

    /**
     * @param int|null $catSort
     * @return $this
     */
    public function setCatSort(?int $catSort = null): self
    {
        $this->catSort = $catSort;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCatActive(): ?bool
    {
        return $this->catActive;
    }

    /**
     * @param bool|null $catActive
     * @return $this
     */
    public function setCatActive(?bool $catActive = null): self
    {
        $this->catActive = $catActive;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDCreated(): ?string
    {
        return $this->dCreated;
    }

    /**
     * @param string|null $dCreated
     * @return $this
     */
    public function setDCreated(?string $dCreated = null): self
    {
        $this->dCreated = $dCreated;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDChanged(): ?string
    {
        return $this->dChanged;
    }

    /**
     * @param string|null $dChanged
     * @return $this
     */
    public function setDChanged(?string $dChanged = null): self
    {
        $this->dChanged = $dChanged;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getReportCount(): ?int
    {
        return $this->reportCount;
    }

    /**
     * @param int|null $reportCount
     * @return $this
     */
    public function setReportCount(?int $reportCount = null): self
    {
        $this->reportCount = $reportCount;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsActiveTree(): ?bool
    {
        return $this->isActiveTree;
    }

    /**
     * @param bool|null $isActiveTree
     * @return $this
     */
    public function setIsActiveTree(?bool $isActiveTree = null): self
    {
        $this->isActiveTree = $isActiveTree;
        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'catId'             => $this->getCatId(),
            'companyId'         => $this->getCompanyId(),
            'catParentId'       => $this->getCatParentId(),
            'catName'           => $this->getCatName(),
            'catDescription'    => $this->getCatDescription(),
            'catSort'           => $this->getCatSort(),
            'catActive'         => $this->getCatActive(),
            'dCreated'          => $this->getDCreated(),
            'dChanged'          => $this->getDChanged(),
            'reportCount'       => $this->getReportCount(),
            'isActiveTree'      => $this->getIsActiveTree(),
        ];
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

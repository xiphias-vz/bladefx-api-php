<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

use Xiphias\BladeFxApi\DTO\AbstractTransfer;

class BladeFxGetReportsListRequestTransfer extends AbstractTransfer
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
    protected string $attribute = '';

    /**
     * @var string
     */
    protected string $returnType = 'JSON';

    /**
     * @var array<string, string>
     */
    protected array $transferPropertyNameMap = [
        'cat_id' => 'catId',
        'search' => 'search',
        'token' => 'accessToken',
        'attribute' => 'attribute',
        'returnType' => 'returnType',
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
     * @return $this
     */
    public function setCatId(int $catId): self
    {
        $this->catId = $catId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSearch(): ?string
    {
        return $this->search;
    }

    /**
     * @param string $search
     * @return $this
     */
    public function setSearch(string $search): self
    {
        $this->search = $search;
        $this->modifiedProperties['search'] = true;

        return $this;
    }

    /**
     * @return $this
     * @throws \Xiphias\BladeFxApi\Exception\TransferPropertyRequiredException
     */
    public function requireToken(): self
    {
        $this->assertPropertyIsSet('accessToken');

        return $this;
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
     * @return $this
     */
    public function setAttribute(string $attribute): self
    {
        $this->attribute = $attribute;
        $this->modifiedProperties['attribute'] = true;

        return $this;
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
     * @return $this
     */
    public function setReturnType(string $returnType): self
    {
        $this->returnType = $returnType;
        $this->modifiedProperties['returnType'] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireReturnType(): self
    {
        $this->assertPropertyIsSet('returnType');

        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'catId' => $this->getCatId(),
            'search' => $this->getSearch(),
            'accessToken' => $this->getAccessToken(),
            'attribute' => $this->getAttribute(),
            'returnType' => $this->getReturnType(),
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
                case 'search':
                case 'accessToken':
                case 'attribute':
                case 'returnType':
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

<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

use Xiphias\BladeFxApi\DTO\AbstractTransfer;

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
    protected string $token;

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
    protected $transferPropertyNameMap = [
        'cat_id' => 'catId',
        'search' => 'search',
        'token' => 'token',
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
        $this->modifiedProperties['search'] = true;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param string $token
     * @return $this
     */
    public function setToken(string $token): self
    {
        $this->token = $token;
        $this->modifiedProperties['token'] = true;

        return $this;
    }

    /**
     * @return $this
     * @throws \Xiphias\BladeFxApi\Exception\TransferPropertyRequiredException
     */
    public function requireToken(): self
    {
        $this->assertPropertyIsSet('token');

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
     * @return void
     */
    public function setAttribute(string $attribute): void
    {
        $this->attribute = $attribute;
        $this->modifiedProperties['attribute'] = true;
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
        $this->modifiedProperties['returnType'] = true;
    }

    /**
     * @return $this
     * @throws \Xiphias\BladeFxApi\Exception\TransferPropertyRequiredException
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
            'catId' => $this->catId,
            'search' => $this->search,
            'token' => $this->token,
            'attribute' => $this->attribute,
            'returnType' => $this->returnType,
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
                case 'token':
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

<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxCategoriesListRequestTransfer extends AbstractTransfer
{
    /**
     * @var int|null
     */
    protected ?int $catId = null;

    /**
     * @var string
     */
    protected string $returnType = 'JSON';

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
            'catId' => $this->catId,
            'returnType' => $this->returnType,
        ];
    }
}

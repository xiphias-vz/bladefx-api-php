<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxCategoriesListResponseTransfer extends AbstractTransfer
{
    /**
     * @var int
     */
    protected int $statusCode = 0;

    /**
     * @var array<BladeFxCategoryTransfer>
     */
    private array $categoriesList = [];

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @param int $statusCode
     * @return $this
     */
    public function setStatusCode(int $statusCode): self
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @return array<BladeFxCategoryTransfer>
     */
    public function getCategoriesList(): array
    {
        return $this->categoriesList;
    }

    /**
     * @param array<BladeFxCategoryTransfer> $categoriesList
     * @return $this
     */
    public function setCategoriesList(array $categoriesList): self
    {
        $this->categoriesList = $categoriesList;

        return $this;
    }
}

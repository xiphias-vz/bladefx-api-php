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
     * @return void
     */
    public function setStatusCode(int $statusCode): void
    {
        $this->statusCode = $statusCode;
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
     * @return void
     */
    public function setCategoriesList(array $categoriesList): void
    {
        $this->categoriesList = $categoriesList;
    }
}

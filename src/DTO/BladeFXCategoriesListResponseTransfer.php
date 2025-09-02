<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFXCategoriesListResponseTransfer extends AbstractTransfer
{
    private int $statusCode;
    private array $categoriesList;

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
     * @return array<CategoryTransfer>
     */
    public function getCategoriesList(): array
    {
        return $this->categoriesList;
    }

    /**
     * @param array<CategoryTransfer> $categoriesList
     * @return void
     */
    public function setCategoriesList(array $categoriesList): void
    {
        $this->categoriesList = $categoriesList;
    }
}

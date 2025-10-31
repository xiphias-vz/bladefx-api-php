<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxCategoriesListResponseTransfer extends AbstractTransfer
{
    /**
     * @var int|null
     */
    protected ?int $statusCode = 0;

    /**
     * @var array<BladeFxCategoryTransfer>|null
     */
    private ?array $categoriesList = [];

    /**
     * @return int|null
     */
    public function getStatusCode(): ?int
    {
        return $this->statusCode;
    }

    /**
     * @param int|null $statusCode
     * @return $this
     */
    public function setStatusCode(?int $statusCode): self
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @return array<BladeFxCategoryTransfer>|null
     */
    public function getCategoriesList(): ?array
    {
        return $this->categoriesList;
    }

    /**
     * @param array<BladeFxCategoryTransfer>|null $categoriesList
     * @return $this
     */
    public function setCategoriesList(?array $categoriesList): self
    {
        $this->categoriesList = $categoriesList;

        return $this;
    }
}

<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxGetCategoriesListRequestTransfer extends AbstractTransfer
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
    public function setCatId(?int $catId): self
    {
        $this->catId = $catId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getReturnType(): ?string
    {
        return $this->returnType;
    }

    /**
     * @param string|null $returnType
     * @return $this
     */
    public function setReturnType(?string $returnType = null): self
    {
        $this->returnType = $returnType;
        return $this;
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
            'catId' => $this->getCatId(),
            'accessToken' => $this->getAccessToken(),
            'returnType' => $this->getReturnType(),
        ];
    }
}

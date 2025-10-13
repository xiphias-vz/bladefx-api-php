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
     * @var BladeFxTokenTransfer
     */
    protected BladeFxTokenTransfer $token;

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
     * @return BladeFxTokenTransfer
     */
    public function getToken(): BladeFxTokenTransfer
    {
        return $this->token;
    }

    /**
     * @param BladeFxTokenTransfer $token
     * @return void
     */
    public function setToken(BladeFxTokenTransfer $token): void
    {
        $this->token = $token;
        $this->modifiedProperties['token'] = true;
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
            'token' => $this->token,
            'returnType' => $this->returnType,
        ];
    }
}

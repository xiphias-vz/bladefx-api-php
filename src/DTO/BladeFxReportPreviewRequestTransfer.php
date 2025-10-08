<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxReportPreviewRequestTransfer extends AbstractTransfer
{
    /**
     * @var BladeFxTokenTransfer
     */
    protected BladeFxTokenTransfer $token;

    /**
     * @var string
     */
    protected string $returnType = 'JSON';

    /**
     * @var int
     */
    protected int $repId;

    /**
     * @var int
     */
    protected int $layoutId = 0;

    /**
     * @var string
     */
    protected string $imageFormat = '';

    /**
     * @var string
     */
    protected string $rootUrl;

    /**
     * @var BladeFxParameterTransfer
     */
    protected BladeFxParameterTransfer $params;

    public function getToken(): BladeFxTokenTransfer
    {
        return $this->token;
    }

    public function setToken(BladeFxTokenTransfer $token): self
    {
        $this->token = $token;
        return $this;
    }

    public function requireToken(): self
    {
        $this->assertPropertyIsSet('token');

        return $this;
    }

    public function getReturnType(): string
    {
        return $this->returnType;
    }

    public function setReturnType(string $returnType): self
    {
        $this->returnType = $returnType;
        return $this;
    }

    public function requireReturnType(): self
    {
        $this->assertPropertyIsSet('returnType');

        return $this;
    }

    public function getRepId(): int
    {
        return $this->repId;
    }

    public function setRepId(int $repId): self
    {
        $this->repId = $repId;
        return $this;
    }

    public function requireRepId(): self
    {
        $this->assertPropertyIsSet('repId');

        return $this;
    }

    public function getLayoutId(): int
    {
        return $this->layoutId;
    }

    public function setLayoutId(int $layoutId): self
    {
        $this->layoutId = $layoutId;
        return $this;
    }

    public function getImageFormat(): string
    {
        return $this->imageFormat;
    }

    public function setImageFormat(string $imageFormat): self
    {
        $this->imageFormat = $imageFormat;
        return $this;
    }

    public function getRootUrl(): string
    {
        return $this->rootUrl;
    }

    public function setRootUrl(string $rootUrl): self
    {
        $this->rootUrl = $rootUrl;
        return $this;
    }

    public function requireRootUrl(): self
    {
        $this->assertPropertyIsSet('rootUrl');

        return $this;
    }

    public function getParams(): BladeFxParameterTransfer
    {
        return $this->params;
    }

    public function setParams(BladeFxParameterTransfer $params): self
    {
        $this->params = $params;
        return $this;
    }

    public function requireParams(): self
    {
        $this->assertPropertyIsSet('params');

        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'token' => $this->getToken(),
            'returnType' => $this->getReturnType(),
            'repId' => $this->getRepId(),
            'layoutId' => $this->getLayoutId(),
            'imageFormat' => $this->getImageFormat(),
            'rootUrl' => $this->getRootUrl(),
            'params' => $this->getParams(),
        ];
    }
}

<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxGetReportPreviewRequestTransfer extends AbstractTransfer
{
//    /**
//     * @var string
//     */
//    protected string $token;

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

//    /**
//     * @return string
//     */
//    public function getToken(): string
//    {
//        return $this->token;
//    }
//
//    /**
//     * @param string $token
//     * @return $this
//     */
//    public function setToken(string $token): self
//    {
//        $this->token = $token;
//        return $this;
//    }

    /**
     * @return $this
     */
    public function requireToken(): self
    {
        $this->assertPropertyIsSet('accessToken');

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
     * @return int
     */
    public function getRepId(): int
    {
        return $this->repId;
    }

    /**
     * @param int $repId
     * @return $this
     */
    public function setRepId(int $repId): self
    {
        $this->repId = $repId;
        return $this;
    }

    /**
     * @return $this
     */
    public function requireRepId(): self
    {
        $this->assertPropertyIsSet('repId');

        return $this;
    }

    /**
     * @return int
     */
    public function getLayoutId(): int
    {
        return $this->layoutId;
    }

    /**
     * @param int $layoutId
     * @return $this
     */
    public function setLayoutId(int $layoutId): self
    {
        $this->layoutId = $layoutId;
        return $this;
    }

    /**
     * @return string
     */
    public function getImageFormat(): string
    {
        return $this->imageFormat;
    }

    /**
     * @param string $imageFormat
     * @return $this
     */
    public function setImageFormat(string $imageFormat): self
    {
        $this->imageFormat = $imageFormat;
        return $this;
    }

    /**
     * @return string
     */
    public function getRootUrl(): string
    {
        return $this->rootUrl;
    }

    /**
     * @param string $rootUrl
     * @return $this
     */
    public function setRootUrl(string $rootUrl): self
    {
        $this->rootUrl = $rootUrl;
        return $this;
    }

    /**
     * @return $this
     */
    public function requireRootUrl(): self
    {
        $this->assertPropertyIsSet('rootUrl');

        return $this;
    }

    /**
     * @return BladeFxParameterTransfer
     */
    public function getParams(): BladeFxParameterTransfer
    {
        return $this->params;
    }

    /**
     * @param BladeFxParameterTransfer $params
     * @return $this
     */
    public function setParams(BladeFxParameterTransfer $params): self
    {
        $this->params = $params;
        return $this;
    }

    /**
     * @return $this
     */
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
            'accessToken' => $this->getAccessToken(),
            'returnType' => $this->getReturnType(),
            'repId' => $this->getRepId(),
            'layoutId' => $this->getLayoutId(),
            'imageFormat' => $this->getImageFormat(),
            'rootUrl' => $this->getRootUrl(),
            'params' => $this->getParams(),
        ];
    }
}

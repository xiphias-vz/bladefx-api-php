<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxGetReportPreviewRequestTransfer extends AbstractTransfer
{
    /**
     * @var string|null
     */
    protected ?string $returnType = 'JSON';

    /**
     * @var int|null
     */
    protected ?int $repId = null;

    /**
     * @var int|null
     */
    protected ?int $layoutId = 0;

    /**
     * @var string|null
     */
    protected ?string $imageFormat = '';

    /**
     * @var string|null
     */
    protected ?string $rootUrl = null;

    /**
     * @var \Xiphias\BladeFxApi\DTO\BladeFxParameterTransfer|null
     */
    protected ?BladeFxParameterTransfer $params = null;

    /**
     * @return string|null
     */
    public function getReturnType(): ?string
    {
        return $this->returnType;
    }

    /**
     * @param string|null $returnType
     *
     * @return $this
     */
    public function setReturnType(?string $returnType)
    {
        $this->returnType = $returnType;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireReturnType()
    {
        $this->assertPropertyIsSet('returnType');

        return $this;
    }

    /**
     * @return int|null
     */
    public function getRepId(): ?int
    {
        return $this->repId;
    }

    /**
     * @param int|null $repId
     *
     * @return $this
     */
    public function setRepId(?int $repId)
    {
        $this->repId = $repId;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireRepId()
    {
        $this->assertPropertyIsSet('repId');

        return $this;
    }

    /**
     * @return int|null
     */
    public function getLayoutId(): ?int
    {
        return $this->layoutId;
    }

    /**
     * @param int|null $layoutId
     *
     * @return $this
     */
    public function setLayoutId(?int $layoutId)
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
     * @param string|null $imageFormat
     *
     * @return $this
     */
    public function setImageFormat(?string $imageFormat)
    {
        $this->imageFormat = $imageFormat;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRootUrl(): ?string
    {
        return $this->rootUrl;
    }

    /**
     * @param string|null $rootUrl
     *
     * @return $this
     */
    public function setRootUrl(?string $rootUrl)
    {
        $this->rootUrl = $rootUrl;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireRootUrl()
    {
        $this->assertPropertyIsSet('rootUrl');

        return $this;
    }

    /**
     * @return \Xiphias\BladeFxApi\DTO\BladeFxParameterTransfer|null
     */
    public function getParams(): ?BladeFxParameterTransfer
    {
        return $this->params;
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxParameterTransfer|null $params
     *
     * @return $this
     */
    public function setParams(?BladeFxParameterTransfer $params)
    {
        $this->params = $params;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireParams()
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

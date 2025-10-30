<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxGetReportByFormatRequestTransfer extends AbstractTransfer
{
    /**
     * @var string
     */
    public const RETURN_TYPE = 'returnType';

    /**
     * @var string
     */
    public const REP_ID = 'repId';

    /**
     * @var string
     */
    public const LAYOUT_ID = 'layoutId';

    /**
     * @var string
     */
    public const IMAGE_FORMAT = 'imageFormat';

    /**
     * @var string
     */
    public const FILE_FORMAT = 'fileFormat';

    /**
     * @var string
     */
    public const PARAMS = 'params';

    /**
     * @var string|null
     */
    protected ?string $returnType;

    /**
     * @var int|null
     */
    protected ?int $repId;

    /**
     * @var int|null
     */
    protected ?int $layoutId;

    /**
     * @var string|null
     */
    protected ?string $imageFormat = null;

    /**
     * @var string|null
     */
    protected ?string $fileFormat = null;

    /**
     * @var BladeFxParameterListTransfer|null
     */
    protected ?BladeFxParameterListTransfer $params;

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
     */
    public function requireReturnType(): self
    {
        $this->assertPropertyIsSet(static::RETURN_TYPE);

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
     * @return $this
     */
    public function setRepId(?int $repId): self
    {
        $this->repId = $repId;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireRepId(): self
    {
        $this->assertPropertyIsSet(self::REP_ID);

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
     * @return $this
     */
    public function setLayoutId(?int $layoutId): self
    {
        $this->layoutId = $layoutId;
        return $this;
    }

    /**
     * @return $this
     */
    public function requireLayoutId(): self
    {
        $this->assertPropertyIsSet(self::LAYOUT_ID);

        return $this;
    }

    /**
     * @return string|null
     */
    public function getImageFormat(): ?string
    {
        return $this->imageFormat;
    }

    /**
     * @param string|null $imageFormat
     * @return $this
     */
    public function setImageFormat(?string $imageFormat = null): self
    {
        $this->imageFormat = $imageFormat;
        return $this;
    }

    /**
     * @return $this
     */
    public function requireImageFormat(): self
    {
        $this->assertPropertyIsSet(static::IMAGE_FORMAT);

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFileFormat(): ?string
    {
        return $this->fileFormat;
    }

    /**
     * @param string|null $fileFormat
     * @return $this
     */
    public function setFileFormat(?string $fileFormat = null): self
    {
        $this->fileFormat = $fileFormat;
        return $this;
    }

    /**
     * @return $this
     */
    public function requireFileFormat(): self
    {
        $this->assertPropertyIsSet(static::FILE_FORMAT);

        return $this;
    }

    /**
     * @return BladeFxParameterListTransfer|null
     */
    public function getParams(): ?BladeFxParameterListTransfer
    {
        return $this->params;
    }

    /**
     * @param BladeFxParameterListTransfer|null $params
     * @return $this
     */
    public function setParams(?BladeFxParameterListTransfer $params = null): self
    {
        $this->params = $params;
        return $this;
    }

    /**
     * @return $this
     */
    public function requireParams(): self
    {
        $this->assertPropertyIsSet(static::PARAMS);

        return $this;
    }

    /**
     * @return $this
     */
    public function requireToken(): self
    {
        $this->assertPropertyIsSet('accessToken');

        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'returnType' => $this->getReturnType(),
            'repId' => $this->getRepId(),
            'layoutId' => $this->getLayoutId(),
            'imageFormat' => $this->getImageFormat(),
            'fileFormat' => $this->getFileFormat(),
            'token' => $this->getToken(),
            'params' => $this->getParams()->toArray(),
        ];
    }
}

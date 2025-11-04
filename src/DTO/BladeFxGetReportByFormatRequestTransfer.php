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
    protected ?string $returnType = null;

    /**
     * @var int|null
     */
    protected ?int $repId = null;

    /**
     * @var int|null
     */
    protected ?int $layoutId = null;

    /**
     * @var string|null
     */
    protected ?string $imageFormat = null;

    /**
     * @var string|null
     */
    protected ?string $fileFormat = null;

    /**
     * @var \Xiphias\BladeFxApi\DTO\BladeFxParameterListTransfer|null
     */
    protected ?BladeFxParameterListTransfer $params = null;

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
    public function setReturnType(?string $returnType = null)
    {
        $this->returnType = $returnType;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireReturnType()
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
     *
     * @return $this
     */
    public function setLayoutId(?int $layoutId)
    {
        $this->layoutId = $layoutId;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireLayoutId()
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
     *
     * @return $this
     */
    public function setImageFormat(?string $imageFormat = null)
    {
        $this->imageFormat = $imageFormat;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireImageFormat()
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
     *
     * @return $this
     */
    public function setFileFormat(?string $fileFormat = null)
    {
        $this->fileFormat = $fileFormat;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireFileFormat()
    {
        $this->assertPropertyIsSet(static::FILE_FORMAT);

        return $this;
    }

    /**
     * @return \Xiphias\BladeFxApi\DTO\BladeFxParameterListTransfer|null
     */
    public function getParams(): ?BladeFxParameterListTransfer
    {
        return $this->params;
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxParameterListTransfer|null $params
     *
     * @return $this
     */
    public function setParams(?BladeFxParameterListTransfer $params = null)
    {
        $this->params = $params;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireParams()
    {
        $this->assertPropertyIsSet(static::PARAMS);

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

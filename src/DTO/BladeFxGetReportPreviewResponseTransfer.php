<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxGetReportPreviewResponseTransfer extends AbstractTransfer
{
    /**
     * @var int
     */
    protected int $statusCode = 0;

    /**
     * @var string
     */
    protected string $url = "";

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @param int $statusCode
     * @return $this
     */
    public function setStatusCode(int $statusCode): self
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return $this
     */
    public function setUrl(string $url): self
    {
        $this->url = $url;
        $this->modifiedProperties['url'] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireUrl(): self
    {
        $this->assertPropertyIsSet('url');

        return $this;
    }
}

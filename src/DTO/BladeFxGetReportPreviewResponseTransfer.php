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
     * @return void
     */
    public function setStatusCode(int $statusCode): void
    {
        $this->statusCode = $statusCode;
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
     * @return void
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
        $this->modifiedProperties['url'] = true;
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

<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxReportParamFormResponseTransfer extends AbstractTransfer
{
    /**
     * @var string|null
     */
    protected ?string $iframeUrl;

    /**
     * @return string
     */
    public function getIframeUrl(): string
    {
        return $this->iframeUrl;
    }

    /**
     * @param string $iframeUrl
     * @return $this
     */
    public function setIframeUrl(string $iframeUrl): self
    {
        $this->iframeUrl = $iframeUrl;
        $this->modifiedProperties['iframeUrl'] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireIframeUrl(): self
    {
        $this->assertPropertyIsSet('iframeUrl');

        return $this;
    }
}

<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxReportParamFormResponseTransfer extends AbstractTransfer
{
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
     * @return void
     */
    public function setIframeUrl(string $iframeUrl): void
    {
        $this->iframeUrl = $iframeUrl;
        $this->modifiedProperties['iframeUrl'] = true;
    }


    public function requireIframeUrl(): self
    {
        $this->assertPropertyIsSet('iframeUrl');

        return $this;
    }
}

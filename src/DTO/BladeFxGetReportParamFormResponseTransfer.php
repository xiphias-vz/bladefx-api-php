<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxGetReportParamFormResponseTransfer extends AbstractTransfer
{
    /**
     * @var string|null
     */
    protected ?string $iframeUrl = null;

    /**
     * @return string|null
     */
    public function getIframeUrl(): ?string
    {
        return $this->iframeUrl;
    }

    /**
     * @param string|null $iframeUrl
     *
     * @return $this
     */
    public function setIframeUrl(?string $iframeUrl)
    {
        $this->iframeUrl = $iframeUrl;
        $this->modifiedProperties['iframeUrl'] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireIframeUrl()
    {
        $this->assertPropertyIsSet('iframeUrl');

        return $this;
    }
}

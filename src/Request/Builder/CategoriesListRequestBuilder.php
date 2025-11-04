<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Request\Builder;

use Xiphias\BladeFxApi\DTO\AbstractTransfer;

class CategoriesListRequestBuilder extends AbstractRequestBuilder
{
    /**
     * @return string
     */
    public function getMethodName(): string
    {
        return parent::METHOD_GET;
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\AbstractTransfer $requestTransfer
     *
     * @return array<string, string>
     */
    public function getAdditionalHeaders(AbstractTransfer $requestTransfer): array
    {
        /** @var \Xiphias\BladeFxApi\DTO\BladeFxGetCategoriesListRequestTransfer $requestTransfer */
        return $this->addAuthHeader($requestTransfer->getAccessToken());
    }
}

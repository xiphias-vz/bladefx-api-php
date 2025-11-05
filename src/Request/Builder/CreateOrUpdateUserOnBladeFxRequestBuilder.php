<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Request\Builder;

use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;
use Xiphias\BladeFxApi\DTO\AbstractTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxCreateOrUpdateUserRequestTransfer;

class CreateOrUpdateUserOnBladeFxRequestBuilder extends AbstractRequestBuilder
{
    /**
     * @return string
     */
    public function getMethodName(): string
    {
        return parent::METHOD_POST;
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\AbstractTransfer $requestTransfer
     *
     * @return array<string, string>
     */
    public function getAdditionalHeaders(AbstractTransfer $requestTransfer): array
    {
        /** @var \Xiphias\BladeFxApi\DTO\BladeFxCreateOrUpdateUserRequestTransfer $requestTransfer */
        return $this->addAuthHeader($requestTransfer->getAccessToken());
    }

    /**
     * @param string $resource
     * @param \Xiphias\BladeFxApi\DTO\AbstractTransfer|\Xiphias\BladeFxApi\DTO\BladeFxCreateOrUpdateUserRequestTransfer $requestTransfer
     *
     * @return \Psr\Http\Message\RequestInterface
     */
    public function buildRequest(
        string $resource,
        AbstractTransfer|BladeFxCreateOrUpdateUserRequestTransfer $requestTransfer
    ): RequestInterface {
        /** @var \Xiphias\BladeFxApi\DTO\BladeFxCreateOrUpdateUserRequestTransfer $bladeFxCreateOrUpdateUserRequestTransfer */
        $bladeFxCreateOrUpdateUserRequestTransfer = $requestTransfer;

        $uri = $this->buildUri($resource, $bladeFxCreateOrUpdateUserRequestTransfer->getBaseUrl());

        $headers = $this->getCombinedHeaders($bladeFxCreateOrUpdateUserRequestTransfer);
        $encodedData = $this->getEncodedData($bladeFxCreateOrUpdateUserRequestTransfer);

        return new Request($this->getMethodName(), $uri, $headers, $encodedData);
    }
}

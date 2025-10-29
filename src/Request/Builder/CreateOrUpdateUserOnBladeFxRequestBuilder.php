<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Request\Builder;

use Xiphias\BladeFxApi\DTO\BladeFxCreateOrUpdateUserRequestTransfer;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;
use Xiphias\BladeFxApi\DTO\AbstractTransfer;

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
     * @param AbstractTransfer $requestTransfer
     * @return array<string, string>
     */
    public function getAdditionalHeaders(AbstractTransfer $requestTransfer): array
    {
        /** @var BladeFxCreateOrUpdateUserRequestTransfer $requestTransfer */
        return $this->addAuthHeader($requestTransfer->getAccessToken());
    }

    /**
     * @param string $resource
     * @param AbstractTransfer|BladeFxCreateOrUpdateUserRequestTransfer $requestTransfer
     * @return RequestInterface
     */
    public function buildRequest(
        string $resource,
        AbstractTransfer|BladeFxCreateOrUpdateUserRequestTransfer $requestTransfer
    ): RequestInterface {
        /** @var BladeFxCreateOrUpdateUserRequestTransfer $requestTransfer */
        $uri = $this->buildUri($resource, $requestTransfer->getBaseUrl());

        $headers = $this->getCombinedHeaders($requestTransfer);
        $encodedData = $this->getEncodedData($requestTransfer);

        return new Request($this->getMethodName(), $uri, $headers, $encodedData);
    }
}

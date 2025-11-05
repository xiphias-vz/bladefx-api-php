<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Request\Builder;

use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;
use Xiphias\BladeFxApi\DTO\AbstractTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxUpdatePasswordRequestTransfer;

class UpdatePasswordOnBladeFxRequestBuilder extends AbstractRequestBuilder
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
        /** @var \Xiphias\BladeFxApi\DTO\BladeFxUpdatePasswordRequestTransfer $bladeFxUpdatePasswordRequestTransfer */
        $bladeFxUpdatePasswordRequestTransfer = $requestTransfer;

        return $this->addAuthHeader($bladeFxUpdatePasswordRequestTransfer->getAccessToken());
    }

    /**
     * @param string $resource
     * @param \Xiphias\BladeFxApi\DTO\AbstractTransfer|\Xiphias\BladeFxApi\DTO\BladeFxUpdatePasswordRequestTransfer $requestTransfer
     *
     * @return \Psr\Http\Message\RequestInterface
     */
    public function buildRequest(
        string $resource,
        AbstractTransfer|BladeFxUpdatePasswordRequestTransfer $requestTransfer
    ): RequestInterface {
        /** @var \Xiphias\BladeFxApi\DTO\BladeFxUpdatePasswordRequestTransfer $bladeFxUpdatePasswordRequestTransfer */
        $bladeFxUpdatePasswordRequestTransfer = $requestTransfer;

        $uri = $this->buildUri($resource, $bladeFxUpdatePasswordRequestTransfer->getBaseUrl(), $this->getUrlParamsFromRequestTransfer($bladeFxUpdatePasswordRequestTransfer));
        $headers = $this->getCombinedHeaders($bladeFxUpdatePasswordRequestTransfer);
        $encodedData = $this->getEncodedData($bladeFxUpdatePasswordRequestTransfer);

        return new Request($this->getMethodName(), $uri, $headers, $encodedData);
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\AbstractTransfer $requestTransfer
     *
     * @return array<string, mixed>
     */
    protected function getUrlParamsFromRequestTransfer(AbstractTransfer $requestTransfer): array
    {
        /** @var \Xiphias\BladeFxApi\DTO\BladeFxUpdatePasswordRequestTransfer $bladeFxUpdatePasswordRequestTransfer */
        $bladeFxUpdatePasswordRequestTransfer = $requestTransfer;

        return [
            'user_id' => $bladeFxUpdatePasswordRequestTransfer->getBladeFxUserId(),
            'password' => $bladeFxUpdatePasswordRequestTransfer->getPassword(),
        ];
    }
}

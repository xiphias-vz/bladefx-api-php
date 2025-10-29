<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Request\Builder;

use Xiphias\BladeFxApi\DTO\BladeFxGetReportParamFormRequestTransfer;
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
     * @param AbstractTransfer $requestTransfer
     * @return array<string, string>
     */
    public function getAdditionalHeaders(AbstractTransfer $requestTransfer): array
    {
        /** @var BladeFxUpdatePasswordRequestTransfer $requestTransfer */
        return $this->addAuthHeader($requestTransfer->getAccessToken());
    }

    /**
     * @param string $resource
     * @param AbstractTransfer|BladeFxUpdatePasswordRequestTransfer $requestTransfer
     * @return RequestInterface
     */
    public function buildRequest(
        string $resource,
        AbstractTransfer|BladeFxUpdatePasswordRequestTransfer $requestTransfer
    ): RequestInterface {
        /** @var BladeFxUpdatePasswordRequestTransfer $requestTransfer */
        $uri = $this->buildUri($resource, $requestTransfer->getBaseUrl(), $this->getUrlParamsFromRequestTransfer($requestTransfer));
        $headers = $this->getCombinedHeaders($requestTransfer);
        $encodedData = $this->getEncodedData($requestTransfer);

        return new Request($this->getMethodName(), $uri, $headers, $encodedData);
    }

    /**
     * @param AbstractTransfer $requestTransfer
     *
     * @return array<string, mixed>
     */
    protected function getUrlParamsFromRequestTransfer(AbstractTransfer $requestTransfer): array
    {
        /** @var BladeFxUpdatePasswordRequestTransfer $requestTransfer */
        return [
            'user_id' => $requestTransfer->getBladeFxUserId(),
            'password' => $requestTransfer->getPassword(),
        ];
    }
}

<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Request\Builder;

use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;
use Xiphias\BladeFxApi\DTO\AbstractTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportsListRequestTransfer;

class ReportsListRequestBuilder extends AbstractRequestBuilder
{
    /**
     * @return string
     */
    public function getMethodName(): string
    {
        return parent::METHOD_GET;
    }

    /**
     * @param AbstractTransfer $requestTransfer
     * @return array<string, string>
     */
    public function getAdditionalHeaders(AbstractTransfer $requestTransfer): array
    {
        /** @var BladeFxGetReportsListRequestTransfer $requestTransfer */
        return $this->addAuthHeader($requestTransfer->getToken());
    }

    /**
     * @param string $resource
     * @param AbstractTransfer|BladeFxGetReportsListRequestTransfer $requestTransfer
     * @return RequestInterface
     */
    public function buildRequest(
        string $resource,
        AbstractTransfer|BladeFxGetReportsListRequestTransfer $requestTransfer
    ): RequestInterface {
        $uri = $this->buildUri($resource, $requestTransfer->getBaseUrl(), $this->getQueryParamsFromRequestTransfer(
            $requestTransfer,
        ));
        $headers = $this->getCombinedHeaders($requestTransfer);
        $encodedData = $this->getEncodedData($requestTransfer);

        return new Request($this->getMethodName(), $uri, $headers, $encodedData);
    }

    /**
     * @param AbstractTransfer $requestTransfer
     * @return array<mixed>
     */
    protected function getQueryParamsFromRequestTransfer(AbstractTransfer $requestTransfer): array
    {
        /** @var BladeFxGetReportsListRequestTransfer $requestTransfer */
        return [
            'catId' => $requestTransfer->getCatId(),
            'attribute' => $requestTransfer->getAttribute(),
        ];
    }
}

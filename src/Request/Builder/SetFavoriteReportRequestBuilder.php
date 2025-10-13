<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Request\Builder;

use Xiphias\BladeFxApi\DTO\BladeFxParameterTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxSetFavoriteReportRequestTransfer;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;
use Xiphias\BladeFxApi\DTO\AbstractTransfer;

class SetFavoriteReportRequestBuilder extends AbstractRequestBuilder
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
     * @return array
     */
    public function getAdditionalHeaders(AbstractTransfer $requestTransfer): array
    {
        /** @var BladeFxSetFavoriteReportRequestTransfer $requestTransfer */
        return $this->addAuthHeader($requestTransfer->getToken());
    }

    /**
     * @param string $resource
     * @param AbstractTransfer|BladeFxSetFavoriteReportRequestTransfer $requestTransfer
     * @param BladeFxParameterTransfer|null $parameterTransfer
     * @return RequestInterface
     */
    public function buildRequest(
        string $resource,
        AbstractTransfer|BladeFxSetFavoriteReportRequestTransfer $requestTransfer,
        ?BladeFxParameterTransfer $parameterTransfer = null
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
     * @return array
     */
    protected function getQueryParamsFromRequestTransfer(AbstractTransfer $requestTransfer): array
    {
        /** @var BladeFxSetFavoriteReportRequestTransfer $requestTransfer */
        return [
            'rep_id' => $requestTransfer->getRepId(),
            'user_id' => $requestTransfer->getUserId(),
        ];
    }
}

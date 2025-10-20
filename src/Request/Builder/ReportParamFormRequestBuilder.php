<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Request\Builder;

use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;
use Xiphias\BladeFxApi\DTO\AbstractTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportParamFormRequestTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportParamFormResponseTransfer;

class ReportParamFormRequestBuilder extends AbstractRequestBuilder
{
    /**
     * @var string
     */
    protected const PARAM_ROOT_URL = 'rootUrl';

    /**
     *
     */
    protected const PARAM_REP_ID = 'rep_id';

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
        /** @var BladeFxGetReportParamFormRequestTransfer $requestTransfer */
        return $this->addAuthHeader($requestTransfer->getAccessToken());
    }

    /**
     * @param string $resource
     * @param AbstractTransfer $requestTransfer
     * @return RequestInterface
     */
    public function buildRequest(
        string $resource,
        AbstractTransfer $requestTransfer
    ): RequestInterface {
        $uri = $this->buildUri($resource, $requestTransfer->getBaseUrl(), $this->getUrlParamsFromRequestTransfer($requestTransfer));
        $headers = $this->getCombinedHeaders($requestTransfer);
        $encodedData = $this->getEncodedData($requestTransfer);

        return new Request($this->getMethodName(), $uri, $headers, $encodedData);
    }

    /**
     * @param AbstractTransfer $requestTransfer
     * @return array<string, string>
     */
    protected function getUrlParamsFromRequestTransfer(AbstractTransfer $requestTransfer): array
    {
        /** @var BladeFxGetReportParamFormRequestTransfer $requestTransfer */
        return [
            static::PARAM_ROOT_URL => $requestTransfer->getRootUrl(),
            static::PARAM_REP_ID => $requestTransfer->getReportId(),
        ];
    }
}

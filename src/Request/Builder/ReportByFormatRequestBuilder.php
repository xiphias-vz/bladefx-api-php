<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Request\Builder;

use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;
use Xiphias\BladeFxApi\DTO\AbstractTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxGetReportByFormatRequestTransfer;

class ReportByFormatRequestBuilder extends AbstractRequestBuilder
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
     * @return array<mixed>
     */
    public function getAdditionalHeaders(AbstractTransfer $requestTransfer): array
    {
        /** @var \Xiphias\BladeFxApi\DTO\BladeFxGetReportByFormatRequestTransfer $bladeFxGetReportByFormatRequestTransfer */
        $bladeFxGetReportByFormatRequestTransfer = $requestTransfer;

        $headers = $this->addAuthHeader($bladeFxGetReportByFormatRequestTransfer->getAccessToken());
        $headers['AcceptEncoding'] = ['*'];
        $headers['accept'] = ['text/plain'];

        return $headers;
    }

    /**
     * @param string $resource
     * @param \Xiphias\BladeFxApi\DTO\AbstractTransfer|\Xiphias\BladeFxApi\DTO\BladeFxGetReportByFormatRequestTransfer $requestTransfer
     *
     * @return \Psr\Http\Message\RequestInterface
     */
    public function buildRequest(
        string $resource,
        AbstractTransfer|BladeFxGetReportByFormatRequestTransfer $requestTransfer
    ): RequestInterface {
        /** @var \Xiphias\BladeFxApi\DTO\BladeFxGetReportByFormatRequestTransfer $bladeFxGetReportByFormatRequestTransfer */
        $bladeFxGetReportByFormatRequestTransfer = $requestTransfer;

        $uri = $this->buildUri($resource, $bladeFxGetReportByFormatRequestTransfer->getBaseUrl());
        $headers = $this->getCombinedHeaders($bladeFxGetReportByFormatRequestTransfer);
        $encodedData = $this->getEncodedData($bladeFxGetReportByFormatRequestTransfer);

        return new Request($this->getMethodName(), $uri, $headers, $encodedData);
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\AbstractTransfer $requestTransfer
     *
     * @return string
     */
    protected function getEncodedData(AbstractTransfer $requestTransfer): string
    {
        /** @var \Xiphias\BladeFxApi\DTO\BladeFxGetReportByFormatRequestTransfer $bladeFxGetReportByFormatRequestTransfer */
        $bladeFxGetReportByFormatRequestTransfer = $requestTransfer;

        $data = $bladeFxGetReportByFormatRequestTransfer->toArray();
        unset($data['params']);
        $data = $this->requestBodyFormatter->changeArrayFromCamelCaseToSnakeCase($data);

        foreach ($bladeFxGetReportByFormatRequestTransfer->getParams()->getParameterList() as $parameterTransfer) {
            if ($this->requestBodyFormatter->parameterTransferIsValid($parameterTransfer)) {
                $parameterArray = $parameterTransfer->toArray();
                $data['params'][] = $this->requestBodyFormatter->changeArrayFromCamelCaseToSnakeCase($parameterArray);
            }
        }

        return $this->encodeJson($data);
    }
}

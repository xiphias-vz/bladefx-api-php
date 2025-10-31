<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Request\Builder;

use Xiphias\BladeFxApi\DTO\BladeFxGetReportByFormatRequestTransfer;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;
use Xiphias\BladeFxApi\DTO\AbstractTransfer;

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
     * @param AbstractTransfer $requestTransfer
     * @return array<mixed>
     */
    public function getAdditionalHeaders(AbstractTransfer $requestTransfer): array
    {
        /** @var BladeFxGetReportByFormatRequestTransfer $requestTransfer */
        $headers = $this->addAuthHeader($requestTransfer->getAccessToken());
        $headers['AcceptEncoding'] = ['*'];
        $headers['accept'] = ['text/plain'];

        return $headers;
    }

    /**
     * @param string $resource
     * @param AbstractTransfer|BladeFxGetReportByFormatRequestTransfer $requestTransfer
     * @return RequestInterface
     */
    public function buildRequest(
        string $resource,
        AbstractTransfer|BladeFxGetReportByFormatRequestTransfer $requestTransfer
    ): RequestInterface {
        /** @var BladeFxGetReportByFormatRequestTransfer $requestTransfer */
        $uri = $this->buildUri($resource, $requestTransfer->getBaseUrl());
        $headers = $this->getCombinedHeaders($requestTransfer);
        $encodedData = $this->getEncodedData($requestTransfer);

        return new Request($this->getMethodName(), $uri, $headers, $encodedData);
    }

    /**
     * @param AbstractTransfer $requestTransfer
     * @return string
     */
    protected function getEncodedData(AbstractTransfer $requestTransfer): string
    {
        /** @var BladeFxGetReportByFormatRequestTransfer $requestTransfer */
        $data = $requestTransfer->toArray();
        unset($data['params']);
        $data = $this->requestBodyFormatter->changeArrayFromCamelCaseToSnakeCase($data);

        /** @var BladeFxGetReportByFormatRequestTransfer $reportByFormatRequestTransfer */
        $reportByFormatRequestTransfer = $requestTransfer;

        foreach ($reportByFormatRequestTransfer->getParams()->getParameterList() as $parameterTransfer) {
            if ($this->requestBodyFormatter->parameterTransferIsValid($parameterTransfer)) {
                $parameterArray = $parameterTransfer->toArray();
                $data['params'][] = $this->requestBodyFormatter->changeArrayFromCamelCaseToSnakeCase($parameterArray);
            }
        }

        return $this->encodeJson($data);
    }
}

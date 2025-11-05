<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Request\Builder;

use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;
use Xiphias\BladeFxApi\BladeFxApiConfig;
use Xiphias\BladeFxApi\DTO\AbstractTransfer;
use Xiphias\BladeFxApi\Request\Formatter\RequestBodyFormatterInterface;

class ReportPreviewRequestBuilder extends AbstractRequestBuilder
{
    protected RequestBodyFormatterInterface $bodyFormatter;

    /**
     * @var \Xiphias\BladeFxApi\BladeFxApiConfig
     */
    protected BladeFxApiConfig $config;

    /**
     * @param \Xiphias\BladeFxApi\Request\Formatter\RequestBodyFormatterInterface $bodyFormatter
     * @param \Xiphias\BladeFxApi\BladeFxApiConfig $config
     */
    public function __construct(
        RequestBodyFormatterInterface $bodyFormatter,
        BladeFxApiConfig $config
    ) {
        parent::__construct($config, $bodyFormatter);

        $this->bodyFormatter = $bodyFormatter;
        $this->config = $config;
    }

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
        /** @var \Xiphias\BladeFxApi\DTO\BladeFxGetReportPreviewRequestTransfer $requestTransfer */
        return $this->addAuthHeader($requestTransfer->getAccessToken());
    }

    /**
     * @param string $resource
     * @param \Xiphias\BladeFxApi\DTO\AbstractTransfer $requestTransfer
     *
     * @return \Psr\Http\Message\RequestInterface
     */
    public function buildRequest(
        string $resource,
        AbstractTransfer $requestTransfer
    ): RequestInterface {
        $uri = $this->buildUri(
            $resource,
            $requestTransfer->getBaseUrl(),
            $this->getQueryParamsFromRequestTransfer(
                $requestTransfer,
            ),
        );
        $headers = $this->getCombinedHeaders($requestTransfer);
        $encodedData = $this->getEncodedData($requestTransfer);

        return new Request($this->getMethodName(), $uri, $headers, $encodedData);
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\AbstractTransfer $requestTransfer
     *
     * @return string
     */
    protected function getEncodedData(AbstractTransfer $requestTransfer): string
    {
        /** @var \Xiphias\BladeFxApi\DTO\BladeFxGetReportPreviewRequestTransfer $bladeFxGetReportPreviewRequestTransfer */
        $bladeFxGetReportPreviewRequestTransfer = $requestTransfer;

        $data = $this->bodyFormatter->formatDataBeforeEncoding(
            $bladeFxGetReportPreviewRequestTransfer,
        );

        $data = $this->cleanDataOfUnneededParameters($bladeFxGetReportPreviewRequestTransfer->getParams()->getParamValue());

        return $this->encodeJson($data);
    }

    /**
     * @param array<mixed> $value
     * @param int|null $options
     * @param int|null $depth
     *
     * @return string|null
     */
    protected function encodeJson(array $value, ?int $options = null, ?int $depth = null): ?string
    {
        if ($options === null) {
            $options = static::DEFAULT_OPTIONS;
        }

        if ($depth === null || $depth === 0) {
            $depth = static::DEFAULT_DEPTH;
        }

        $encodedValue = json_encode($value, $options, $depth);

        return $encodedValue !== false ? $encodedValue : null;
    }

    /**
     * @param string $paramValue
     *
     * @return array<mixed>
     */
    protected function cleanDataOfUnneededParameters(string $paramValue): array
    {
        return ['entryText' => $paramValue];
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\AbstractTransfer $requestTransfer
     *
     * @return array<string, string>
     */
    protected function getQueryParamsFromRequestTransfer(AbstractTransfer $requestTransfer): array
    {
        /** @var \Xiphias\BladeFxApi\DTO\BladeFxGetReportPreviewRequestTransfer $requestTransfer */
        return [
            'rootUrl' => $requestTransfer->getRootUrl(),
        ];
    }
}

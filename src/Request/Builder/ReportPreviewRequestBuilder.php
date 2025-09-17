<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Request\Builder;

use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;
use Xiphias\BladeFxApi\DTO\AbstractTransfer;
use Xiphias\BladeFxApi\BladeFxApiConfig;
use Xiphias\BladeFxApi\DTO\BladeFxReportPreviewRequestTransfer;
use Xiphias\BladeFxApi\Request\Formatter\RequestBodyFormatterInterface;

class ReportPreviewRequestBuilder extends AbstractRequestBuilder
{
    protected RequestBodyFormatterInterface $bodyFormatter;

    /**
     * @var BladeFxApiConfig
     */
    protected BladeFxApiConfig $config;

    /**
     * @param RequestBodyFormatterInterface $bodyFormatter
     * @param BladeFxApiConfig $config
     */
    public function __construct(
        RequestBodyFormatterInterface $bodyFormatter,
        BladeFxApiConfig $config
    )
    {
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
     * @param AbstractTransfer $requestTransfer
     * @return array
     */
    public function getAdditionalHeaders(AbstractTransfer $requestTransfer): array
    {
        /** @var BladeFxReportPreviewRequestTransfer $reportPreviewRequestTransfer */
        return $this->addAuthHeader($requestTransfer->getToken());
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
        $uri = $this->buildUri(
            $resource,
            $this->getQueryParamsFromRequestTransfer(
                $requestTransfer,
            )
        );
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
        /** @var BladeFxReportPreviewRequestTransfer $requestTransfer */
        $data = $this->bodyFormatter->formatDataBeforeEncoding(
            $requestTransfer,
        );

        $data = $this->cleanDataOfUnneededParameters($data);

        return $this->encodeJson($data);
    }

    /**
     * @param $value
     * @param $options
     * @param $depth
     * @return string|null
     */
    protected function encodeJson($value, $options = null, $depth = null): ?string
    {
        if ($options === null) {
            $options = static::DEFAULT_OPTIONS;
        }

        if ($depth === null || $depth === 0) {
            $depth = static::DEFAULT_DEPTH;
        }

        $value['params'] = [$value['params']->toArray(true, true)];
        $encodedValue = json_encode($value, $options, $depth);

        return $encodedValue !== false ? $encodedValue : null;
    }

    /**
     * @param array<string, mixed> $data
     *
     * @return array<string, string>
     */
    protected function cleanDataOfUnneededParameters(array $data): array
    {
        foreach ($data as $key => $value) {
            if ($key === 'returnType' || $key === 'rootUrl' || $key === 'token') {
                unset($data[$key]);
            }
        }

        return $data;
    }

    /**
     * @param AbstractTransfer $requestTransfer
     * @return array
     */
    protected function getQueryParamsFromRequestTransfer(AbstractTransfer $requestTransfer): array
    {
        /** @var BladeFxReportPreviewRequestTransfer $requestTransfer */
        return [
            'rootUrl' => $requestTransfer->getRootUrl(),
        ];
    }
}

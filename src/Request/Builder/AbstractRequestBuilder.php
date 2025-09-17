<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Request\Builder;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\RequestInterface;
use Xiphias\BladeFxApi\BladeFxApiConfig;
use Xiphias\BladeFxApi\DTO\AbstractTransfer;
use Xiphias\BladeFxApi\DTO\BladeFxTokenTransfer;
use Xiphias\BladeFxApi\Request\Formatter\RequestBodyFormatterInterface;

abstract class AbstractRequestBuilder implements RequestBuilderInterface
{
    public const DEFAULT_OPTIONS = JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT | JSON_PARTIAL_OUTPUT_ON_ERROR;

    /**
     * @var int
     */
    public const DEFAULT_DEPTH = 512;

    /**
     * @var string
     */
    protected const METHOD_POST = 'POST';

    /**
     * @var string
     */
    protected const METHOD_GET = 'GET';

    /**
     * @var string
     */
    protected const HEADER_TYPE_AUTHORIZATION = 'Authorization';

    /**
     * @var string
     */
    protected const AUTHORIZATION_TYPE_BEARER = 'Bearer';

    /**
     * @var string
     */
    private const FULL_URL_PATTERN = '{{baseUri}}{{resource}}/';

    /**
     * @var BladeFxApiConfig
     */
    private BladeFxApiConfig $apiClientConfig;

    /**
     * @var RequestBodyFormatterInterface
     */
    protected RequestBodyFormatterInterface $requestBodyFormatter;

    /**
     * @param BladeFxApiConfig $apiClientConfig
     * @param RequestBodyFormatterInterface $requestBodyFormatter
     */
    public function __construct(
        BladeFxApiConfig $apiClientConfig,
        RequestBodyFormatterInterface $requestBodyFormatter
    ) {
        $this->apiClientConfig = $apiClientConfig;
        $this->requestBodyFormatter = $requestBodyFormatter;
    }

    /**
     * @return string
     */
    abstract protected function getMethodName(): string;

    /**
     * @param AbstractTransfer $requestTransfer
     * @return array
     */
    abstract protected function getAdditionalHeaders(AbstractTransfer $requestTransfer): array;

    /**
     * @param string $resource
     * @param AbstractTransfer $requestTransfer
     * @return RequestInterface
     */
    public function buildRequest(
        string $resource,
        AbstractTransfer $requestTransfer
    ): RequestInterface {
        $uri = $this->buildUri($resource, []);
        $headers = $this->getCombinedHeaders($requestTransfer);
        $encodedData = $this->getEncodedData($requestTransfer);

        return new Request($this->getMethodName(), $uri, $headers, $encodedData);
    }

    /**
     * @param string $resource
     * @param array $queryParams
     * @return Uri
     */
    protected function buildUri(string $resource, array $queryParams = []): Uri
    {
        $url = $this->buildFullRequestUrl($resource, $queryParams);

        return new Uri($url);
    }

    /**
     * @param string $resource
     * @param array $queryParams
     * @return string
     */
    private function buildFullRequestUrl(string $resource, array $queryParams = []): string
    {
        $url = strtr(
            self::FULL_URL_PATTERN,
            [
                '{{baseUri}}' => $this->apiClientConfig->getApiBaseUri(),
                '{{resource}}' => $resource,
            ],
        );

        if ($queryParams) {
            $url .= '?' . http_build_query($queryParams);
        }

        return $url;
    }

    /**
     * @param AbstractTransfer $requestTransfer
     * @return array
     */
    public function getCombinedHeaders(AbstractTransfer $requestTransfer): array
    {
        return array_merge(
            $this->getConfig()->getCommonApiRequestHeaders(),
            $this->getAdditionalHeaders($requestTransfer),
        );
    }

    /**
     * @param AbstractTransfer $requestTransfer
     * @return string
     */
    protected function getEncodedData(AbstractTransfer $requestTransfer): string
    {
        $data = $requestTransfer->toArray(true, true);

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

        $value = json_encode($value, $options, $depth);

        return $value !== false ? $value : null;
    }

    /**
     * @return BladeFxApiConfig
     */
    protected function getConfig(): BladeFxApiConfig
    {
        return $this->apiClientConfig;
    }

    /**
     * @param BladeFxTokenTransfer $requestTransfer
     * @return string[]
     */
    protected function addAuthHeader(BladeFxTokenTransfer $requestTransfer): array
    {
        return [
            static::HEADER_TYPE_AUTHORIZATION => static::AUTHORIZATION_TYPE_BEARER . ' ' . $requestTransfer->getToken(),
        ];
    }
}

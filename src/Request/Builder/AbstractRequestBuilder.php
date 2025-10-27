<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\Request\Builder;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\RequestInterface;
use Xiphias\BladeFxApi\BladeFxApiConfig;
use Xiphias\BladeFxApi\DTO\AbstractTransfer;
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
     * @return array<string, string>
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
        $uri = $this->buildUri($resource, $requestTransfer->getBaseUrl(), []);
        $headers = $this->getCombinedHeaders($requestTransfer);
        $encodedData = $this->getEncodedData($requestTransfer);

        return new Request($this->getMethodName(), $uri, $headers, $encodedData);
    }

    /**
     * @param string $resource
     * @param string $baseUrl
     * @param array<mixed> $queryParams
     * @return Uri
     */
    protected function buildUri(string $resource, string $baseUrl, array $queryParams = []): Uri
    {
        $url = $this->buildFullRequestUrl($resource, $baseUrl, $queryParams);

        return new Uri($url);
    }

    /**
     * @param string $resource
     * @param string $baseUrl
     * @param array<mixed> $queryParams
     * @return string
     */
    private function buildFullRequestUrl(string $resource, string $baseUrl, array $queryParams = []): string
    {
        if ($baseUrl === '') {
            $baseUrl = $this->apiClientConfig->getDefaultApiBaseUri();
        }

        $url = strtr(
            self::FULL_URL_PATTERN,
            [
                '{{baseUri}}' => $baseUrl,
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
     * @return array<mixed>
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
        $data = $requestTransfer->toArray();

        return $this->encodeJson($data);
    }

    /**
     * @param array $value
     * @param int|null $options
     * @param int|null $depth
     * @return string|null
     */
    protected function encodeJson(array $value, int $options = null, int $depth = null): ?string
    {
        if ($options === null) {
            $options = JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE;
        }

        if ($depth === null || $depth === 0) {
            $depth = 512;
        }

        $value = $this->normalizeData($value);

        $json = json_encode($value, $options, $depth);

        return $json !== false ? $json : null;
    }

    /**
     * @param mixed $data
     * @return mixed
     */
    protected function normalizeData(mixed $data): mixed
    {
        if ($data instanceof \ArrayObject) {
            $data = $data->getArrayCopy();
        }

        if (is_object($data)) {
            if (method_exists($data, 'toArray')) {
                $data = $data->toArray();
            } else {
                $data = get_object_vars($data);
            }
        }

        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $data[$key] = $this->normalizeData($value);
            }
        }

        return $data;
    }

    /**
     * @return BladeFxApiConfig
     */
    protected function getConfig(): BladeFxApiConfig
    {
        return $this->apiClientConfig;
    }

    /**
     * @param string $token
     * @return string[]
     */
    protected function addAuthHeader(string $token): array
    {
        return [
            static::HEADER_TYPE_AUTHORIZATION => static::AUTHORIZATION_TYPE_BEARER . ' ' . $token,
        ];
    }
}

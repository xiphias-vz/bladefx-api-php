<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

use ArrayObject;
use Xiphias\BladeFxApi\Exception\TransferPropertyRequiredException;

class AbstractTransfer
{
    /**
     * @var string
     */
    public const ACCESS_TOKEN = 'accessToken';

    /**
     * @var array<string, array<string, mixed>>
     */
    protected array $transferMetadata = [];

    /**
     * @var array<string, string>
     */
    protected array $transferPropertyNameMap = [];

    /**
     * @var array<string, bool>
     */
    protected array $modifiedProperties = [];

    /**
     * @var string
     */
    protected string $baseUrl = '';

    /**
     * @var string|null
     */
    protected ?string $accessToken = '';

    /**
     * @var \Xiphias\BladeFxApi\DTO\BladeFxTokenTransfer|null
     */
    protected ?BladeFxTokenTransfer $bladeFxTokenTransfer;

    public function __construct()
    {
        $this->initCollectionProperties();
    }

    /**
     * @return void
     */
    protected function initCollectionProperties(): void
    {
        foreach ($this->transferMetadata as $property => $metaData) {
            if ($metaData['is_collection'] && $this->$property === null) {
                $this->$property = new ArrayObject();
            }
        }
    }

    /**
     * @param string $property
     *
     * @throws \Xiphias\BladeFxApi\Exception\TransferPropertyRequiredException
     *
     * @return void
     */
    protected function assertPropertyIsSet(string $property): void
    {
        if ($this->$property === null || (is_array($this->$property) && $this->$property === [] && $this->transferMetadata[$property]['is_strict'])) {
            throw new TransferPropertyRequiredException(sprintf(
                'Missing required property "%s" for transfer %s.',
                $property,
                static::class,
            ));
        }
    }

    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * @param string $baseUrl
     *
     * @return $this
     */
    public function setBaseUrl(string $baseUrl)
    {
        $this->baseUrl = $baseUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * @param string $accessToken
     *
     * @return $this
     */
    public function setAccessToken(string $accessToken)
    {
        $this->accessToken = $accessToken;

        return $this;
    }

    /**
     * @return $this
     */
    public function requireAccessToken()
    {
        $this->assertPropertyIsSet(static::ACCESS_TOKEN);

        return $this;
    }

    /**
     * @return \Xiphias\BladeFxApi\DTO\BladeFxTokenTransfer|null
     */
    public function getToken(): ?BladeFxTokenTransfer
    {
        return $this->bladeFxTokenTransfer;
    }

    /**
     * @param \Xiphias\BladeFxApi\DTO\BladeFxTokenTransfer|null $bladeFxTokenTransfer
     *
     * @return $this
     */
    public function setToken(?BladeFxTokenTransfer $bladeFxTokenTransfer = null)
    {
        $this->bladeFxTokenTransfer = $bladeFxTokenTransfer;

        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'baseUrl' => $this->getBaseUrl(),
            'accessToken' => $this->getAccessToken(),
        ];
    }
}

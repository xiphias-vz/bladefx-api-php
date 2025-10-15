<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

use ArrayObject;
use Xiphias\BladeFxApi\Exception\TransferPropertyRequiredException;

class AbstractTransfer
{
    /**
     * @var array<string, array<string, mixed>>
     */
    protected $transferMetadata = [];

    /**
     * @var array<string, string>
     */
    protected $transferPropertyNameMap = [];

    /**
     * @var array<string, bool>
     */
    protected $modifiedProperties = [];

    /**
     * @var string
     */
    protected $baseUrl = '';

    /**
     * @var string
     */
    protected string $token;

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
     * @return void
     */
    public function setBaseUrl(string $baseUrl): void
    {
        $this->baseUrl = $baseUrl;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param string $token
     * @return $this
     */
    public function setToken(string $token): self
    {
        $this->token = $token;
        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'baseUrl' => $this->getBaseUrl(),
            'token'   => $this->getToken()
        ];
    }
}

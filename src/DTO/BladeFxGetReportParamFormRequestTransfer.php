<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxGetReportParamFormRequestTransfer extends AbstractTransfer
{
    /**
     * @var string
     */
    protected string $token;

    /**
     * @var int|null
     */
    protected ?int $rep_id = null;

    /**
     * @var string
     */
    protected string $rootUrl;

    /**
     * @var array<string, string>
     */
    protected $transferPropertyNameMap = [
        'token' => 'token',
        'rep_id' => 'rep_id',
        'rootUrl' => 'rootUrl'
    ];

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
        $this->modifiedProperties['token'] = true;

        return $this;
    }

    /**
     * @return $this
     * @throws \Xiphias\BladeFxApi\Exception\TransferPropertyRequiredException
     */
    public function requireToken(): self
    {
        $this->assertPropertyIsSet('token');

        return $this;
    }

    /**
     * @return int|null
     */
    public function getReportId(): ?int
    {
        return $this->rep_id;
    }

    /**
     * @param int $rep_id
     * @return void
     */
    public function setReportId(int $rep_id): void
    {
        $this->rep_id = $rep_id;
        $this->modifiedProperties['rep_id'] = true;
    }

    /**
     * @return string
     */
    public function getRootUrl(): string
    {
        return $this->rootUrl;
    }

    /**
     * @param string $rootUrl
     * @return void
     */
    public function setRootUrl(string $rootUrl): void
    {
        $this->rootUrl = $rootUrl;
        $this->modifiedProperties['rootUrl'] = true;
    }

    /**
     * @return $this
     */
    public function requireRootUrl(): self
    {
        $this->assertPropertyIsSet('rootUrl');

        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'token' => $this->token,
            'rep_id' => $this->rep_id,
            'rootUrl' => $this->rootUrl,
        ];
    }

    /**
     * @param array<mixed> $data
     * @param bool $ignoreMissingProperties
     * @return $this
     */
    public function fromArray(array $data, bool $ignoreMissingProperties = false): static
    {
        foreach ($data as $property => $value) {
            $normalizedPropertyName = $this->transferPropertyNameMap[$property] ?? null;

            switch ($normalizedPropertyName) {
                case 'token':
                case 'rep_id':
                case 'rootUrl':
                    $this->$normalizedPropertyName = $value;
                    $this->modifiedProperties[$normalizedPropertyName] = true;
                    break;

                default:
                    if (!$ignoreMissingProperties) {
                        throw new \InvalidArgumentException(sprintf('Missing property `%s` in `%s`', $property, static::class));
                    }
            }
        }

        return $this;
    }
}
